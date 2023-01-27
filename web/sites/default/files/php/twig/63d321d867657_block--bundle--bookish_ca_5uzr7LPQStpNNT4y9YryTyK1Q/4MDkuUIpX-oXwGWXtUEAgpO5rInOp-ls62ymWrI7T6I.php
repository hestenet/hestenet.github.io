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

/* profiles/contrib/bookish/themes/bookish_theme/templates/block--bundle--bookish_callout.html.twig */
class __TwigTemplate_14f63dbe8511fe5b71d7548bb95b6079 extends \Twig\Template
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
        // line 28
        $this->loadTemplate("sfc--bk-callout.html.twig", "profiles/contrib/bookish/themes/bookish_theme/templates/block--bundle--bookish_callout.html.twig", 28)->display(twig_array_merge($context, ["text" => Drupal\twig_tweak\TwigTweakExtension::viewFilter(twig_get_attribute($this->env, $this->source, (($__internal_compile_0 =         // line 29
($context["content"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["#block_content"] ?? null) : null), "body", [], "any", false, false, true, 29), ["label" => "hidden", "type" => "text_default"]), "image" => Drupal\twig_tweak\TwigTweakExtension::viewFilter(twig_get_attribute($this->env, $this->source, (($__internal_compile_1 =         // line 33
($context["content"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["#block_content"] ?? null) : null), "field_image", [], "any", false, false, true, 33), ["label" => "hidden", "type" => "bookish_image", "settings" => ["image_style" => "callout_block"]])]));
    }

    public function getTemplateName()
    {
        return "profiles/contrib/bookish/themes/bookish_theme/templates/block--bundle--bookish_callout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 33,  40 => 29,  39 => 28,);
    }

    public function getSourceContext()
    {
        return new Source("", "profiles/contrib/bookish/themes/bookish_theme/templates/block--bundle--bookish_callout.html.twig", "/Users/viol/Dev/hestenet.github.io/web/profiles/contrib/bookish/themes/bookish_theme/templates/block--bundle--bookish_callout.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("include" => 28);
        static $filters = array("view" => 29);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['include'],
                ['view'],
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
