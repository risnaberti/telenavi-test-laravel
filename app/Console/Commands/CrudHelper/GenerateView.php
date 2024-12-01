<?php

namespace App\Console\Commands\CrudHelper;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GenerateView
{
    private $stubPath = "";

    public function __construct($stubPath)
    {
        $this->stubPath = $stubPath;
    }

    public function generateViews($modelVariables)
    {
        // Direktori stub views
        $stubViewsPath = $this->stubPath . '/views';

        // Direktori output views
        $viewDir = resource_path("views/" . $modelVariables['modelRoute']);

        // Cari semua file .stub secara rekursif
        $allStubFiles = File::allFiles($stubViewsPath);

        $stubFiles = [];
        $subStubFiles = [];

        // Filter stub files, hindari create.stub dan edit.stub
        foreach ($allStubFiles as $file) {
            $fileName = $file->getFilename();
            $dotPosition = strpos($fileName, '.');
            $extensionPart = substr($fileName, $dotPosition + 1);

            // if (in_array($fileName, ['create.stub', 'edit.stub'])) {
            //     continue;
            // }

            if ($extensionPart == 'stub') {
                $stubFiles[] = $file;
            } else {
                $subStubFiles[] = $file;
            }
        }

        // Buat direktori views
        File::makeDirectory($viewDir, 0755, true, true);

        foreach ($stubFiles as $stubFile) {
            $relativePath = Str::after($stubFile->getPathname(), $stubViewsPath . DIRECTORY_SEPARATOR);
            $viewRelativePath = Str::replaceLast('.stub', '.blade.php', $relativePath);
            $viewFullPath = $viewDir . '/' . $viewRelativePath;

            File::makeDirectory(dirname($viewFullPath), 0755, true, true);

            $viewContent = File::get($stubFile->getPathname());
            $stubFilePart = explode('.', $stubFile->getFilename(), 2)[0];

            if (empty($subStubFiles)) {
                throw new \Exception("Wajib ada file field, minimal 1.", 1);
            }

            // Gabungkan konten sub stub
            $viewSubContentCombine = $this->generateSubStubContent($modelVariables, $subStubFiles, $stubFilePart);

            // Ganti placeholder sub stub
            $viewContent = str_replace("{{" . $stubFilePart . ".field.stub}}", $viewSubContentCombine, $viewContent);

            // Ganti placeholder variabel model
            foreach ($modelVariables as $key => $value) {
                if (is_string($value)) {
                    $viewContent = str_replace("{{" . $key . "}}", $value, $viewContent);
                }
            }

            // Simpan file view
            File::put($viewFullPath, $viewContent);
        }
    }

    protected function generateSubStubContent($modelVariables, $subStubFiles, $stubFilePart)
    {
        $viewSubContentCombine = "";

        foreach ($modelVariables['fieldRules'] as $column => $rules) {
            $matchingSubStub = $this->findMatchingSubStub($subStubFiles, $stubFilePart, $rules['type']);

            if ($matchingSubStub) {
                $viewSubContent = File::get($matchingSubStub->getPathname());
                $viewSubContent = strtr($viewSubContent, [
                    '{{column}}' => $column,
                    '{{column_underscore}}' => $column,
                    '{{column_value}}' => isset($rules['values']) ? var_export($rules['values'], 1) : "",
                    '{{title}}' => Str::title(Str::replace('_', ' ', $column))
                ]);

                $viewSubContentCombine .= "\n" . $viewSubContent;
            }
        }

        return $viewSubContentCombine;
    }

    protected function findMatchingSubStub($subStubFiles, $stubFilePart, $fieldType)
    {
        // cari file substub berdasarkan nama nya
        if ($fieldType == "text") {
            $searchSubStubFileName = "$stubFilePart.field.stub";
        } else {
            $searchSubStubFileName = "$stubFilePart.field.$fieldType.stub";
        }

        foreach ($subStubFiles as $subStubFile) {
            $subStubFilename = $subStubFile->getFilename();

            if ($searchSubStubFileName == $subStubFilename) {
                return $subStubFile;
            }
        }

        return null;
    }
}
