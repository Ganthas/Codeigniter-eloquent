<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Layout
{
    private $obj;
    public $layout_view;
    private $title = '';
    private $titleDefault = '';
    private $css_list = array();
    private $js_list = array();
    private $metas = array();
    private $navegacion = array();
    public $current = '';
    public $subCurrent = '';

    private $header = '';
    private $footer = '';
    private $bodyClass = '';
    private $idObj = '';

    public function __construct()
    {
        #obj
        $this->obj =& get_instance();
        $this->layout_view = "layout/default";
        #CSS
        #$this->css('public/libraries/font-awesome/css/font-awesome.css');
        #$this->css('public/libraries/bootstrap4/css/bootstrap.css');

        $this->css('public/css/bootstrap-3.3.7.min.css');
        $this->css('public/css/bootstrap-datepicker.min.css');
        $this->css('public/css/ie10-viewport-bug-workaround.css');

        $this->css('public/css/pde.css');
        $this->css('public/css/signin.css');
        $this->css('public/css/style.css');

        $this->css('public/libraries/datatables/datatables.css');
        $this->css('public/libraries/validation-engine/css/validationEngine.jquery.css');
        //$this->css('public/libraries/notifIt-master/notifIt/css/notifIt.css');
        #js
        $this->js('public/libraries/jquery.alphanum.js');
        $this->js('public/js/moment-es.js');
        $this->js('public/js/moment.js');
        $this->js('public/js/bootstrap-datepicker.es.js');
        $this->js('public/js/bootstrap-datepicker.min.js');

        $this->js('public/js/bootstrap-3.3.7.min.js');



        $this->js('public/libraries/datatables/datatables.js');
        $this->js('public/js/utiles.js');
        $this->js('public/libraries/noty/packaged/jquery.noty.packaged.js');
        //$this->js('public/libraries/jquery-ui.js');
        //$this->js('https://cdnjs.cloudflare.com/ajax/libs/jquery-sortable/0.9.13/jquery-sortable-min.js');
        // $this->js('https://www.google.com/recaptcha/api.js');
        // $this->js('public/libraries/jquery-3.2.1.min.js');

        $this->js('public/js/errores.js');

        $this->js('public/js/jquery.validationEngine.js');
        $this->js('public/js/jquery.validationEngine-es.js');

        $this->js('https://cdn.jsdelivr.net/knockout.validation/2.0.3/knockout.validation.min.js');
        $this->js('public/js/knockstrap.min.js');
        $this->js('public/libraries/knockout3.4.2.js');


        //$this->js('public/libraries/jquery-1.9.1.min.js');
        $this->js('public/libraries/jquery-3.2.1.min.js');


        #notificaciones

        #layout
        if (isset($this->obj->layout_view)) {
            $this->layout_view = $this->obj->layout_view;
        }
    }

    public function view($view, $data = null, $return = false)
    {
        $data['content_for_layout'] = $this->obj->load->view($view, $data, true);
        $this->block_replace = true;
        $output = $this->obj->load->view($this->layout_view, $data, $return);
        return $output;
    }
    /**
     * Agregar title a la pagina actual
     *
     * @param $title
     */
    public function title($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }



    public function setHeader($h)
    {
        $this->header = $h;
    }

    public function getHeader()
    {
        return $this->header;
    }

    public function setFooter($f)
    {
        $this->footer = $f;
    }

    public function getFooter()
    {
        return $this->footer;
    }

    public function setBodyClass($bc)
    {
        $this->bodyClass = $bc;
    }

    public function getBodyClass()
    {
        return $this->bodyClass ? 'class="'.$this->bodyClass.'"' : "";
    }

    public function setidObj($id)
    {
        $this->idObj = $id;
    }

    public function getidObj()
    {
        return $this->idObj ? 'id="'.$this->idObj.'"' : "";
    }

    /**
     * Agregar Javascript a la pagina actual
     * @param $item
     */
    public function js($item)
    {
        $this->js_list[] = $item;
    }

    public function getJs()
    {
        $js = '';
        if ($this->js_list) {
            $this->js_list=array_reverse($this->js_list);
            foreach ($this->js_list as $aux) {
                if (strpos($aux, 'http')!==false) {
                    $js .= '<script type="text/javascript" src="'.$aux.'"></script>';
                } else {
                    $js .= '<script type="text/javascript" src="'. base_url() .$aux.'"></script>';
                }
            }
        }
        return $js;
    }
    /**
     * Agregar CSS a la pagina actual
     * @param $item
     */
    public function css($item)
    {
        $this->css_list[] = $item;
    }

    public function getCss()
    {
        $css = '';
        if ($this->css_list) {
            foreach ($this->css_list as $aux) {
                $css .= '<link rel="stylesheet" type="text/css"  href="'. base_url() . $aux.'" />';
            }
        }
        return $css;
    }

    /**
     * Agregar Metas a la pagina actual
     * @param $name, $content
     */
    public function setMeta($name, $content)
    {
        $meta = new stdClass();
        $meta->name = $name;
        $meta->content = $content;
        $this->metas[] = $meta;
    }

    public function headMeta()
    {
        $metas = '';
        if ($this->metas) {
            foreach ($this->metas as $aux) {
                $metas .= '<meta name="'.$aux->name.'" content="'.$aux->content.'" />
		';
            }
        }
        return $metas;
    }

    /**
     * Agregar Navegacion a la pagina actual
     * @param $nav
     */

    public function nav($nav)
    {
        $this->navegacion = $nav;
    }

    public function getNav()
    {
        $html = '';
        if ($this->navegacion) {
            $html = '<ol class="breadcrumb">';
            $i = 1;
            $ruta_master = '/';
            foreach ($this->navegacion as $nombre=>$ruta) {
                $ruta_master = base_url() . $ruta."/";
                $html .= ($i==count($this->navegacion))? '<li class="active">'.$nombre.'</li>':'<li><a href="'.$ruta_master.'">'.$nombre.'</a></li>';
                $i++;
            }

            $html .='</ol>';
        }
        return $html;
    }
}
