<?php
/**
 * /application/core/MY_Loader.php
 *
 */
class Template_Loader{
	
    public function template($template_name, $vars = array(), $return = FALSE)
    {
        $content  = $this->view('templates/header', $vars, $return);
        $content .= $this->view($template_name, $vars, $return);
        $content .= $this->view('templates/footer', $vars, $return);

        if ($return)
        {
            return $content;
        }
    }
	
	public function check()
	{
		return 'asd';	
	}
}

?>