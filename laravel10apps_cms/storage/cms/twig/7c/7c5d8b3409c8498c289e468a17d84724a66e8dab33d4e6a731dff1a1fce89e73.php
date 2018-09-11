<?php

/* /Users/macbookair/www/laravel10apps/themes/custom/layouts/default.htm */
class __TwigTemplate_85e027c7de31db0d07a4eff12b69e28b8736255d1ce32d0ed68a5b1f0e0c7189 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<html>
    <head></head>
    <body>
        Hello
    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "/Users/macbookair/www/laravel10apps/themes/custom/layouts/default.htm";
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<html>
    <head></head>
    <body>
        Hello
    </body>
</html>", "/Users/macbookair/www/laravel10apps/themes/custom/layouts/default.htm", "");
    }
}
