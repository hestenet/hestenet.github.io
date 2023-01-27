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

/* sfc--bk-blog-list */
class __TwigTemplate_0e48b5f5c5152edeedfe2da2ad9b2cae extends \Twig\Template
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
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\sfc\TwigExtension']->prepareContext($context, "bk_blog_list"), "html", null, true);
        if (($context["cache"] ?? null)) {
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cache"] ?? null), 1, $this->source), "html", null, true);
        }
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("sfc/component.bk_blog_list"), "html", null, true);
        echo "  <div class=\"bk-blog-list container container--margin\">
    ";
        // line 2
        $this->loadTemplate("sfc--bk-blog-title.html.twig", "sfc--bk-blog-list", 2)->display(twig_array_merge($context, ["title" => t("Recent posts"), "element" => "h2"]));
        // line 6
        echo "    <div class=\"bk-blog-list__blogs\">
      ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["nodes"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["node"]) {
            // line 8
            echo "        ";
            $this->loadTemplate("sfc--bk-blog-teaser.html.twig", "sfc--bk-blog-list", 8)->display(twig_array_merge($context, ["title" => twig_get_attribute($this->env, $this->source,             // line 9
$context["node"], "label", [], "method", false, false, true, 9), "link" => $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => twig_get_attribute($this->env, $this->source,             // line 10
$context["node"], "id", [], "any", false, false, true, 10)]), "text" => Drupal\twig_tweak\TwigTweakExtension::viewFilter(twig_get_attribute($this->env, $this->source,             // line 11
$context["node"], "body", [], "any", false, false, true, 11), ["label" => "hidden", "type" => "bookish_summary", "settings" => ["trim_length" => 350]]), "title_element" => "h3", "image" => Drupal\twig_tweak\TwigTweakExtension::viewFilter(twig_get_attribute($this->env, $this->source,             // line 17
$context["node"], "field_image", [], "any", false, false, true, 17), ["label" => "hidden", "type" => "bookish_image", "settings" => ["image_style" => "blog_teaser"]])]));
            // line 23
            echo "      ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['node'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "      ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\sfc\TwigExtension']->cache($this->sandbox->ensureToStringAllowed(($context["nodes"] ?? null), 24, $this->source)), "html", null, true);
        echo "
      ";
        // line 25
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\sfc\TwigExtension']->cache("node_list"), "html", null, true);
        echo "
    </div>
    ";
        // line 27
        $this->loadTemplate("sfc--bk-more-link.html.twig", "sfc--bk-blog-list", 27)->display(twig_array_merge($context, ["link" => "/blog", "text" => t("all posts")]));
        // line 28
        echo "  </div>";
    }

    public function getTemplateName()
    {
        return "sfc--bk-blog-list";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  102 => 28,  100 => 27,  95 => 25,  90 => 24,  76 => 23,  74 => 17,  73 => 11,  72 => 10,  71 => 9,  69 => 8,  52 => 7,  49 => 6,  47 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "sfc--bk-blog-list", "");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 1, "include" => 2, "for" => 7);
        static $filters = array("escape" => 1, "t" => 3, "view" => 11);
        static $functions = array("sfc_prepare_context" => 1, "attach_library" => 1, "path" => 10, "sfc_cache" => 24);

        try {
            $this->sandbox->checkSecurity(
                ['if', 'include', 'for'],
                ['escape', 't', 'view'],
                ['sfc_prepare_context', 'attach_library', 'path', 'sfc_cache']
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
