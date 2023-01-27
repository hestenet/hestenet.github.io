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

/* sfc--bk-blog-teaser.html.twig */
class __TwigTemplate_c825e6cede8a64e3aa25f6f1951ddef6 extends \Twig\Template
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
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\sfc\TwigExtension']->prepareContext($context, "bk_blog_teaser"), "html", null, true);
        if (($context["cache"] ?? null)) {
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cache"] ?? null), 1, $this->source), "html", null, true);
        }
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("sfc/component.bk_blog_teaser"), "html", null, true);
        echo "  ";
        $context["title_element"] = ((($context["title_element"] ?? null)) ? (($context["title_element"] ?? null)) : ("h2"));
        // line 2
        echo "  <article class=\"bk-blog-teaser\" role=\"article\">
    <div class=\"bk-blog-teaser__image\">";
        // line 3
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["image"] ?? null), 3, $this->source), "html", null, true);
        echo "</div>
    <div class=\"bk-blog-teaser__bottom\">
      <div class=\"bk-blog-teaser__title\">
        <";
        // line 6
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_element"] ?? null), 6, $this->source), "html", null, true);
        echo " class=\"bk-blog-teaser__title-element\">
          <a class=\"bk-blog-teaser__link\" href=\"";
        // line 7
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["link"] ?? null), 7, $this->source), "html", null, true);
        echo "\">
            ";
        // line 8
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 8, $this->source), "html", null, true);
        echo "
          </a>
        </";
        // line 10
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_element"] ?? null), 10, $this->source), "html", null, true);
        echo ">
      </div>
      <div class=\"bk-blog-teaser__text bk-text\">";
        // line 12
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["text"] ?? null), 12, $this->source), "html", null, true);
        echo "</div>
      <div class=\"bk-blog-teaser__footer\">
        ";
        // line 14
        if (($context["tags"] ?? null)) {
            // line 15
            echo "        <div class=\"bk-blog-teaser__tags\">
          ";
            // line 16
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, ($context["tags"] ?? null), 0, 2));
            foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
                // line 17
                echo "            <div class=\"bk-blog-teaser__tag\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["tag"], 17, $this->source), "html", null, true);
                echo "</div>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            echo "        </div>
        ";
        }
        // line 21
        echo "        ";
        if (($context["time"] ?? null)) {
            // line 22
            echo "          <div class=\"bk-blog-teaser__byline\">
          ";
            // line 23
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_date_format_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["time"] ?? null), 23, $this->source), "M j, Y"), "html", null, true);
            echo "
          </div>
        ";
        }
        // line 26
        echo "      </div>
    </div>
  </article>";
    }

    public function getTemplateName()
    {
        return "sfc--bk-blog-teaser.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 26,  107 => 23,  104 => 22,  101 => 21,  97 => 19,  88 => 17,  84 => 16,  81 => 15,  79 => 14,  74 => 12,  69 => 10,  64 => 8,  60 => 7,  56 => 6,  50 => 3,  47 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "sfc--bk-blog-teaser.html.twig", "");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 1, "set" => 1, "for" => 16);
        static $filters = array("escape" => 1, "slice" => 16, "date" => 23);
        static $functions = array("sfc_prepare_context" => 1, "attach_library" => 1);

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set', 'for'],
                ['escape', 'slice', 'date'],
                ['sfc_prepare_context', 'attach_library']
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
