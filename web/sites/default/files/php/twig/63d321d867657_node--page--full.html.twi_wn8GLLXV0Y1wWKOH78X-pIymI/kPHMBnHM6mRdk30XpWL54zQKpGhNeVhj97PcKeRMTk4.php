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

/* profiles/contrib/bookish/themes/bookish_theme/templates/node--page--full.html.twig */
class __TwigTemplate_6f826b63cfaf7ef2b54d97fa0ba83544 extends \Twig\Template
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
        $this->loadTemplate("sfc--bk-page.html.twig", "profiles/contrib/bookish/themes/bookish_theme/templates/node--page--full.html.twig", 1)->display(twig_array_merge($context, ["title" => twig_get_attribute($this->env, $this->source,         // line 2
($context["node"] ?? null), "label", [], "method", false, false, true, 2), "text" => Drupal\twig_tweak\TwigTweakExtension::viewFilter(twig_get_attribute($this->env, $this->source,         // line 3
($context["node"] ?? null), "body", [], "any", false, false, true, 3), ["label" => "hidden", "type" => "text_default"])]));
        // line 8
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\sfc\TwigExtension']->cache($this->sandbox->ensureToStringAllowed(($context["node"] ?? null), 8, $this->source)), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "profiles/contrib/bookish/themes/bookish_theme/templates/node--page--full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 8,  41 => 3,  40 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "profiles/contrib/bookish/themes/bookish_theme/templates/node--page--full.html.twig", "/Users/viol/Dev/hestenet.github.io/web/profiles/contrib/bookish/themes/bookish_theme/templates/node--page--full.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("include" => 1);
        static $filters = array("view" => 3, "escape" => 8);
        static $functions = array("sfc_cache" => 8);

        try {
            $this->sandbox->checkSecurity(
                ['include'],
                ['view', 'escape'],
                ['sfc_cache']
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
