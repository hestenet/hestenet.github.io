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

/* sfc--bk-blog-page.html.twig */
class __TwigTemplate_eba7acb52526ad5d30c85c3052964e17 extends \Twig\Template
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
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\sfc\TwigExtension']->prepareContext($context, "bk_blog_page"), "html", null, true);
        if (($context["cache"] ?? null)) {
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cache"] ?? null), 1, $this->source), "html", null, true);
        }
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("sfc/component.bk_blog_page"), "html", null, true);
        echo "  <div class=\"bk-blog-page container container--margin\">
    ";
        // line 2
        $this->loadTemplate("sfc--bk-blog-title.html.twig", "sfc--bk-blog-page.html.twig", 2)->display(twig_array_merge($context, ["title" => t("Blog")]));
        // line 3
        echo "    <div class=\"bk-blog-page__blogs\">
      ";
        // line 4
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
            // line 5
            echo "        ";
            $context["tags"] = [];
            // line 6
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["node"], "field_tags", [], "any", false, false, true, 6));
            foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
                // line 7
                echo "          ";
                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tag"], "entity", [], "any", false, false, true, 7), "bundle", [], "method", false, false, true, 7) == "tags")) {
                    // line 8
                    echo "            ";
                    $context["tags"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["tags"] ?? null), 8, $this->source), [0 => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["tag"], "entity", [], "any", false, false, true, 8), "label", [], "method", false, false, true, 8)]);
                    // line 9
                    echo "            ";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\sfc\TwigExtension']->cache($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["tag"], "entity", [], "any", false, false, true, 9), 9, $this->source)), "html", null, true);
                    echo "
          ";
                }
                // line 11
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 12
            echo "        ";
            $this->loadTemplate("sfc--bk-blog-teaser.html.twig", "sfc--bk-blog-page.html.twig", 12)->display(twig_array_merge($context, ["title" => twig_get_attribute($this->env, $this->source,             // line 13
$context["node"], "label", [], "method", false, false, true, 13), "time" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 14
$context["node"], "created", [], "any", false, false, true, 14), "value", [], "any", false, false, true, 14), "link" => $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => twig_get_attribute($this->env, $this->source,             // line 15
$context["node"], "id", [], "any", false, false, true, 15)]), "text" => Drupal\twig_tweak\TwigTweakExtension::viewFilter(twig_get_attribute($this->env, $this->source,             // line 16
$context["node"], "body", [], "any", false, false, true, 16), ["label" => "hidden", "type" => "bookish_summary", "settings" => ["trim_length" => 250]]), "image" => Drupal\twig_tweak\TwigTweakExtension::viewFilter(twig_get_attribute($this->env, $this->source,             // line 21
$context["node"], "field_image", [], "any", false, false, true, 21), ["label" => "hidden", "type" => "bookish_image", "settings" => ["image_style" => "blog_teaser"]]), "tags" =>             // line 26
($context["tags"] ?? null)]));
            // line 28
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
        // line 29
        echo "      ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\sfc\TwigExtension']->cache($this->sandbox->ensureToStringAllowed(($context["nodes"] ?? null), 29, $this->source)), "html", null, true);
        echo "
      ";
        // line 30
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\sfc\TwigExtension']->cache("node_list"), "html", null, true);
        echo "
    </div>
  </div>";
    }

    public function getTemplateName()
    {
        return "sfc--bk-blog-page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 30,  118 => 29,  104 => 28,  102 => 26,  101 => 21,  100 => 16,  99 => 15,  98 => 14,  97 => 13,  95 => 12,  89 => 11,  83 => 9,  80 => 8,  77 => 7,  72 => 6,  69 => 5,  52 => 4,  49 => 3,  47 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "sfc--bk-blog-page.html.twig", "");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 1, "include" => 2, "for" => 4, "set" => 5);
        static $filters = array("escape" => 1, "t" => 2, "merge" => 8, "view" => 16);
        static $functions = array("sfc_prepare_context" => 1, "attach_library" => 1, "sfc_cache" => 9, "path" => 15);

        try {
            $this->sandbox->checkSecurity(
                ['if', 'include', 'for', 'set'],
                ['escape', 't', 'merge', 'view'],
                ['sfc_prepare_context', 'attach_library', 'sfc_cache', 'path']
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
