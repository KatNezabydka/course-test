<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\Constraint;


class Student extends Model

{
//    use Notifiable;

    protected $table = 'students';

    protected $fillable = [
        'email',
        'avatar',
        'point',
        'step-1',
        'step-2',
        'step-3',
        'step-4',
        'time',
    ];

    public static function UploadAvatar($image)
    {
        $fullFilename = null;
        $size_path = Config::get('settings.image');
        $file = $image;

        $path = 'users' . '/' . date('F') . date('Y') . '/';

        $filename = basename($file->getClientOriginalName(), '.' . $file->getClientOriginalExtension());
        $filename_counter = 1;

        // Make sure the filename does not exist, if it does make sure to add a number to the end 1, 2, 3, etc...
        while (Storage::disk('upload')->exists($path . $filename . '.' . $file->getClientOriginalExtension())) {
            $filename = basename($file->getClientOriginalName(), '.' . $file->getClientOriginalExtension()) . (string)($filename_counter++);
        }

        $fullPath = $path . $filename . '.' . $file->getClientOriginalExtension();

        $ext = $file->guessClientExtension();
        if (in_array($ext, ['jpeg', 'jpg', 'png', 'gif'])) {

            $image = Image::make($file)
                ->resize($size_path['width'], $size_path['height'], function (Constraint $constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->orientate()
                ->encode($file->getClientOriginalExtension(), 75);

            // move uploaded file from temp to uploads directory
            if (Storage::disk('upload')->put($fullPath, (string)$image, 'public')) {
                $status = true;
                $fullFilename = $fullPath;
            } else {
                $status = 'Ошибка загрузки изображения';
            }
        } else {
            $status = 'Неправильный тип изображения';
        }
        // echo out script that TinyMCE can handle and update the image in the editor
        return ['status' => $status, 'fullFileName' => $fullFilename];
    }
}
