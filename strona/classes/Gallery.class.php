<?php

class Gallery {

    // Konstruktory
    public function __construct($show_now=FALSE) {
        // Czy strona ma odrazu się wyrenderować na ekranie
        if ($show_now === TRUE)
        {
            $this->render_page();
        }
        else
        {
            $this->return_gallery_string();
        }
    }


    private function get_array_of_images()
    {
        if (is_dir(ABS_GALLERY_BASEDIR))
        {
            $files = scandir(ABS_GALLERY_BASEDIR);
            $array = array();
            foreach($files as $file)
            {
                if(is_file(ABS_GALLERY_BASEDIR.$file))
                {
                    $array[] = GALLERY_BASEDIR.$file;
                }
            }
            return $array;
        }
        else
        {
            return false;
        }

    }


    public function return_gallery_string()
    {
        $all = '';

        $array = $this->get_array_of_images();
        foreach($array as $file)
        {
            $all .= '<a href="'.$file.'">';
            $all .= '<img src="'.BASEDIR.'generate_image.php?file='.$file.'&width=200&height=100" alt="Opis" />';
            $all .= '</a>';
        }
        return $all;
    }


    /**
     *  Ta funkcja jest dla Was nieobowiązkowa - Niedotyczy Was :)
     *  Nie wykorzystujemy jej queryw projekcie
     */
    private function make_thumb($src, $dest, $desired_width) {
        /* read the source image */
        $source_image = imagecreatefromjpeg($src);
        $width = imagesx($source_image);
        $height = imagesy($source_image);

        /* find the "desired height" of this thumbnail, relative to the desired width  */
        $desired_height = floor($height * ($desired_width / $width));

        /* create a new, "virtual" image */
        $virtual_image = imagecreatetruecolor($desired_width, $desired_height);

        /* copy source image at a resized size */
        imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

        /* create the physical thumbnail image to its destination */
        imagejpeg($virtual_image, $dest);
    }
}

?>
