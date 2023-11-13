<?php

namespace Application\View;

use Application\Exceptions\TemplateNotFound;

class View {

        protected string $templateDir = 'templates';
        protected string $layoutFile = '';
        protected array $templateData = [];

        public function __construct($templateFile, $templateData = []) {
            $this->layoutFile = $templateFile;
            $this->templateData = $templateData;
        }

        public function render() {
            $templateFile = $this->templateDir . '/' . $this->layoutFile;
            if (!file_exists($templateFile)) {
                throw new TemplateNotFound('Layout not found: ' . $templateFile);
            }
            extract($this->templateData);
            ob_start();
            include $templateFile;
            $content = ob_get_contents();
            ob_end_clean();
            return $content;
        }

}