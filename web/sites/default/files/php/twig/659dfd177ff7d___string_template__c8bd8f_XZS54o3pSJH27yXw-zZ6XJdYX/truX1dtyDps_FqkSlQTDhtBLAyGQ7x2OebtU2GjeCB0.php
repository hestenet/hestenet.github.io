<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* __string_template__c8bd8f98cebbac93f986285c3ae3c746 */
class __TwigTemplate_7808fe3404b0af6c0f8780721af1b06a extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<style>
/* @Font-Faces */
@font-face {
  font-family: Philosopher;
  src: local(\"Philosopher\"), url(\"/fonts/Philosopher/Philosopher-Regular.ttf\");
  font-weight: normal;
  font-style: normal;
  font-display: swap;
}

@font-face {
  font-family: Cinzel;
  src: local(\"Cinzel\"), url(\"/fonts/Cinzel/Cinzel-VariableFont_wght.ttf\");
  font-weight: normal;
  font-style: normal;
  font-display: swap;
}


@font-face {
  font-family: metropolis;
  src: url(\"/fonts/metropolis/Metropolis-Regular.woff2\") format(\"woff2\");
  font-weight: normal;
  font-style: normal;
  font-display: swap;
}

@font-face {
  font-family: metropolis;
  src: url(\"/fonts/metropolis/Metropolis-Bold.woff2\") format(\"woff2\");
  font-weight: 700;
  font-style: normal;
  font-display: swap;
}

@font-face {
  font-family: metropolis;
  src: url(\"../fonts/metropolis/Metropolis-SemiBold.woff2\") format(\"woff2\");
  font-weight: 600;
  font-style: normal;
  font-display: swap;
}

/* lora-regular - latin */

@font-face {
  font-family: Lora;
  src: local(\"Lora Regular\"), local(\"Lora-Regular\"), url(\"/fonts/lora/lora-v14-latin-regular.woff2\") format(\"woff2\");
  font-weight: 400;
  font-style: normal;
  font-display: swap;
}

/* lora-italic - latin */

@font-face {
  font-family: Lora;
  src: local(\"Lora Italic\"), local(\"Lora-Italic\"), url(\"/fonts/lora/lora-v14-latin-italic.woff2\") format(\"woff2\");
  font-weight: 400;
  font-style: italic;
  font-display: swap;
}

/* lora-700 - latin */

@font-face {
  font-family: Lora;
  src: local(\"Lora Bold\"), local(\"Lora-Bold\"), url(\"/fonts/lora/lora-v14-latin-700.woff2\") format(\"woff2\");
  font-weight: 700;
  font-style: normal;
  font-display: swap;
}
</style>";
    }

    public function getTemplateName()
    {
        return "__string_template__c8bd8f98cebbac93f986285c3ae3c746";
    }

    public function getDebugInfo()
    {
        return array (  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "__string_template__c8bd8f98cebbac93f986285c3ae3c746", "");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array();
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
                [],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
