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

/* profiles/contrib/bookish/themes/bookish_theme/templates/node--blog--full.html.twig */
class __TwigTemplate_5189daa02a8543516c4712f432dc0634 extends \Twig\Template
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
        $context["tags"] = [];
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "field_tags", [], "any", false, false, true, 2));
        foreach ($context['_seq'] as $context["key"] => $context["tag"]) {
            // line 3
            echo "  ";
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tag"], "entity", [], "any", false, false, true, 3), "bundle", [], "method", false, false, true, 3) == "tags")) {
                // line 4
                echo "    ";
                $context["tags"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["tags"] ?? null), 4, $this->source), [0 => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tag"], "entity", [], "any", false, false, true, 4), "label", [], "method", false, false, true, 4)]);
                // line 5
                echo "    ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\sfc\TwigExtension']->cache($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["tag"], "entity", [], "any", false, false, true, 5), 5, $this->source)), "html", null, true);
                echo "
  ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['tag'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 8
        $this->loadTemplate("sfc--bk-blog.html.twig", "profiles/contrib/bookish/themes/bookish_theme/templates/node--blog--full.html.twig", 8)->display(twig_array_merge($context, ["title" => twig_get_attribute($this->env, $this->source,         // line 9
($context["node"] ?? null), "label", [], "method", false, false, true, 9), "time" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 10
($context["node"] ?? null), "created", [], "any", false, false, true, 10), "value", [], "any", false, false, true, 10), "text" => Drupal\twig_tweak\TwigTweakExtension::viewFilter(twig_get_attribute($this->env, $this->source,         // line 11
($context["node"] ?? null), "body", [], "any", false, false, true, 11), ["label" => "hidden", "type" => "text_default"]), "image" => Drupal\twig_tweak\TwigTweakExtension::viewFilter(twig_get_attribute($this->env, $this->source,         // line 15
($context["node"] ?? null), "field_image", [], "any", false, false, true, 15), ["label" => "hidden", "type" => "bookish_image", "settings" => ["image_style" => "blog_large"]]), "tags" =>         // line 20
($context["tags"] ?? null)]));
        // line 22
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\sfc\TwigExtension']->cache($this->sandbox->ensureToStringAllowed(($context["node"] ?? null), 22, $this->source)), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "profiles/contrib/bookish/themes/bookish_theme/templates/node--blog--full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 22,  66 => 20,  65 => 15,  64 => 11,  63 => 10,  62 => 9,  61 => 8,  51 => 5,  48 => 4,  45 => 3,  41 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "profiles/contrib/bookish/themes/bookish_theme/templates/node--blog--full.html.twig", "/Users/viol/Dev/hestenet.github.io/web/profiles/contrib/bookish/themes/bookish_theme/templates/node--blog--full.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 1, "for" => 2, "if" => 3, "include" => 8);
        static $filters = array("merge" => 4, "escape" => 5, "view" => 11);
        static $functions = array("sfc_cache" => 5);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'for', 'if', 'include'],
                ['merge', 'escape', 'view'],
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
