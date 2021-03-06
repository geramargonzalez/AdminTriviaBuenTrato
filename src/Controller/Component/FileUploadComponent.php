<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Utility\Text;

class FileUploadComponent extends Component
{

    public function fileUpload($image, $folder_name, $avatar_image = 'avatar.jpg') {
        if (empty($image) && $image['error'] != 0) {
            return [
                'status' => 500,
                'msg' => __('Error')
            ];
        } else {
            $addmited_file_size = 10000000; // 10MB
            $target_path = 'IMG' . DS . $folder_name;
            $file_size = fileSize($image['tmp_name']);
            if ($file_size == false || $addmited_file_size < $file_size) {
                return [
                    'status' => 500,
                    'msg' => __('The picture has to be smaller than 10MB. Please, try again.')
                ];
            }
            if (!file_exists($target_path)) {
                mkdir($target_path, 0755, true);
            }
            if (isset($image['name']) && !empty($image['name'])) {
                $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
                if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png') {
                    $file_name = Text::uuid() . '.' . $ext;
                    move_uploaded_file($image['tmp_name'], $target_path . DS . $file_name);
                } else {
                    return [
                        'status' => 500,
                        'msg' => __('Invalid file extension. Please, try again.')
                    ];
                }
            } else {
                $file_name = $avatar_image;
            }
            return [
                'status' => 200,
                'file_name' => $file_name
            ];
        }
    }

    public function base64Upload($image, $folder) {
        $image = explode(',', $image)[1];
        $name = Text::uuid() . '.png';
        $folder = IMG . DS . $folder;
        $route = $folder . DS . $name;
        if (!file_exists($folder)) {
            mkdir($folder, 0644, true);
        }
        $file = file_put_contents($route, base64_decode($image));
        return $file ? $name : null;
    }

    public function imageUrlUpload($image, $folder) {
        if ($image) {
            $name = Text::uuid() . '.png';
            $route = IMG . DS . $folder . DS . $name;
            $image = file_get_contents($image);
            return file_put_contents($route, $image) ? $name : null;
        }
        return null;
    }

    public function excelUpload($excel, $folder_name) {
        $ret_array = [];
        $addmited_file_size = 2000000;
        $valid_ext = true;
        $target_path = EXCEL . DS . $folder_name;
        $file_size = fileSize($excel['tmp_name']);
        if (!$file_size) {
            $file_size = 1;
        }
        if (!file_exists($target_path)) {
            mkdir($target_path, 0755, true);
        }
        if (isset($excel['name']) && !empty($excel['name'])) {
            $ext = pathinfo($excel['name'], PATHINFO_EXTENSION);
            $valid_ext = $ext == 'jpg' || $ext == 'png';
            $file_name = Text::uuid() . '.' . $ext;
            move_uploaded_file($excel['tmp_name'], $target_path . DS . $file_name);
        }
        if ($addmited_file_size < $file_size || $file_size == false) {
            $ret_array  = ['status' => 'ERROR', 'msg' => __('The file has to be smaller than 2MB. Please, try again.')];
        } else {
            $ret_array = ['status' => 'OK', 'file_name' => $file_name];
        }
        return $ret_array;
    }

}
