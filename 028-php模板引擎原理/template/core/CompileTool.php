<?php

class CompileTool
{
    private $template;
    private $content;
    private $comfile;
    private $left = '{';
    private $right = '}';
    private $value = array();
    private $T_P = array();
    private $T_R = array();
    private $phpTurn;
    public function __construct($template,$compileFile,$config)
    {
        $this->template = $template;
        $this->compileFile = $compileFile;
        $this->content = file_get_contents($template);

        if($config['php_turn'] === false) {
            $this->T_P[] = "#<\?(=|php|)(.+?)\?>#is";
            $this->T_R[] = "&lt;? \ \1\ \2? &gt;";

            $this->T_P[] = "#\{\\$([a-zA-Z_\x7f -\xff][a-zA-Z0-9_\x7f-\xff]*)\}#";
            $this->T_P[] = "#\{(loop|foreach)\ \$([a-zA-Z_\x7f -\xff][a-zA-Z0-9_\x7f-\xff]*)}#i";
            $this->T_P[] = "#\{\/(loop|foreach|if)}#";
            $this->T_P[] = "#\{([K|V])\}#";
            $this->T_P[] = "#\{if(.*?)\}}#i";
            $this->T_P[] = "#\{(else if|elseif)(.*?)\}#i";
            $this->T_P[] = "#\{else\}#i";

            $this->T_P[] = "#\{(\#|\*)(.*?)(\#|\*)\}#";
            $this->T_R[] = "<?php echo \ $this->value['\ \1'];?>";
            $this->T_R[] = "<?php foreach((array)\ $this->value['\ \2'] as $K => $V){?>";
            $this->T_R[] = "<?php }? >";
            $this->T_R[] = "<? php if(\ \1){? >";
            $this->T_R[] = "<? php } else if(\ \2) {?>";
            $this->T_R[] = "<?php }else {? >";
            $this->T_R[] = "";
        }
    }

    /**
     * @desc 生成文件
     * @param $source
     * @param $destFile
     */
    public function compile()
    {
        $this->c_var2();
        $this->c_staticFile();
    }

    /**
     * @desc 输出val值
     */
    public function c_var2()
    {
        if(strpos($this->content,'{$') !== false) {
            $this->content = preg_replace($this->T_R,$this->T_R,$this->content);
        }
    }

    /**
     * 加入对静态javascript文件的解析
     */
    public function c_staticFile()
    {
        $this->content = preg_replace('#\ {\! (.*?)\! \}#','<script src=\ \1'.'? t='.time().'></script>',$this->content);
    }

    public function set($name,$value) {
        $this->$name = $value;
    }

    public function get($name)
    {
        return $this->$name;
    }


}