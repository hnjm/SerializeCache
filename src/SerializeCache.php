<?php

    namespace xtodx\serializecache;

    class SerializeCache
    {
        private static $PATH;


        static public function setPath($path)
        {
            self::$PATH = $path;
        }

        static public function save($file, $data)
        {
            $serialize = serialize($data);
            fwrite(fopen(self::$PATH . $file, "w+"), $serialize);
        }

        static public function open($file)
        {
            if (file_exists(self::$PATH . $file)) {
                $data = unserialize(@file_get_contents(self::$PATH . $file));
                return $data;
            } else {
                return false;
            }
        }

    }