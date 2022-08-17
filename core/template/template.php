<?php

class Template
{
    private $templates;

    public function __construct()
    {
        $templatesPath = './core/template/templates.php';
        $this->templates = include "$templatesPath";
    }

    public function renderTemplate(array $params = [], string $template = ''): string
    {
        $templatePath = null;
        if (!$template) {
            $uri = trim($_SERVER['REQUEST_URI'], '/');
            $uriWithQuery = explode('?', $uri);
            $templateName = $uriWithQuery[0];
        }
        else $templateName = $template;

        if ($templateName && in_array($templateName, array_keys($this->templates))) {
            $templatePath = $this->templates[$templateName];
        }
        if ($templatePath) {
            extract($params);
            ob_start();
            include "$templatePath";
            return ob_get_clean();
        }
    }
}