<?php

class Wrapper
{
    protected static $model_paths = array();
    private static $autoLoadFile = 'wrapper';

    public function __construct()
    {
        $path = 'application/' . self::$autoLoadFile . '/';
        self::openDirAutoload($path);
    }

    public static function openDirAutoload($path)
    {

        if ($dir = opendir($path)) {
            while (($archivo = readdir($dir)) !== false) {
                if ($archivo != '.' && $archivo != '..' && $archivo != '.htaccess') {
                    $explodeArchivo = explode('.', $archivo);
                    $extension = '.' . $explodeArchivo[1];
                    if ($extension == EXT) {
                        return self::autoload($explodeArchivo[0]);
                    }
                }
            }
            closedir($dir);
        }
    }

    public static function autoload($class)
    {

        static $CI = null;

		// get the CI instance
        is_null($CI) and $CI = &get_instance();

		// Don't attempt to autoload CI_ , EE_, or custom prefixed classes
        if (in_array(substr($class, 0, 3), array('CI_', 'EE_')) or strpos($class, $CI->config->item('subclass_prefix')) === 0) {
            return;
        }

		// Prepare class
        $class = strtolower($class);

		// Prepare path
        $paths = array();
        if (method_exists($CI->load, 'get_package_paths')) {
			// use CI 2.0 loader's model paths
            $paths = $CI->load->get_package_paths(false);
        }

        foreach (array_merge(array(APPPATH), $paths, self::$model_paths) as $path) {
			// Prepare file
            $file = $path . self::$autoLoadFile . '/' . $class . EXT;
			
			// Check if file exists, require_once if it does
            if (file_exists($file)) {
                require_once($file);

                break;
            }
        }

		// if class not loaded, do a recursive search of model paths for the class
        if (!class_exists($class)) {
            foreach ($paths as $path) {
                $found = Wrapper::recursive_require_once($class, $path . self::$autoLoadFile);
                if ($found) {
                    break;
                }
            }
        }
    }

    protected static function recursive_require_once($class, $path)
    {
        $found = false;
        if (is_dir($path)) {
            $handle = opendir($path);
            if ($handle) {
                while (false !== ($dir = readdir($handle))) {
					// If dir does not contain a dot
                    if (strpos($dir, '.') === false) {
						// Prepare recursive path
                        $recursive_path = $path . '/' . $dir;

						// Prepare file
                        $file = $recursive_path . '/' . $class . EXT;

						// Check if file exists, require_once if it does
                        if (file_exists($file)) {
                            require_once($file);
                            $found = true;

                            break;
                        } else if (is_dir($recursive_path)) {
							// Do a recursive search of the path for the class
                            Wrapper::recursive_require_once($class, $recursive_path);
                        }
                    }
                }

                closedir($handle);
            }
        }
        return $found;
    }
}