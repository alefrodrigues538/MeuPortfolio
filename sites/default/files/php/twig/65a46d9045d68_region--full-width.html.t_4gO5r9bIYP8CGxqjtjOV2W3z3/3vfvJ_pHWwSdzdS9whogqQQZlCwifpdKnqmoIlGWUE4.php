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

/* themes/contrib/bootstrap_barrio/templates/layout/region--full-width.html.twig */
class __TwigTemplate_7e0617237a756dd68ba07030692b11e3 extends Template
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
        // line 15
        $context["wrapper_attribute"] = $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute();
        // line 17
        $context["wrapper_classes"] = [0 => "full-width", 1 => ("region-wrapper-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 19
($context["region"] ?? null), 19, $this->source)))];
        // line 23
        $context["classes"] = [0 => "region", 1 => ("region-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 25
($context["region"] ?? null), 25, $this->source)))];
        // line 28
        if (($context["content"] ?? null)) {
            // line 29
            echo "  <section";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["wrapper_attribute"] ?? null), "addClass", [0 => ($context["wrapper_classes"] ?? null)], "method", false, false, true, 29), 29, $this->source), "html", null, true);
            echo ">
    ";
            // line 30
            if ( !($context["clean"] ?? null)) {
                // line 31
                echo "    <div class=";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["container"] ?? null), 31, $this->source), "html", null, true);
                echo ">
      <div";
                // line 32
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 32), 32, $this->source), "html", null, true);
                echo ">
    ";
            }
            // line 34
            echo "        ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 34, $this->source), "html", null, true);
            echo "
    ";
            // line 35
            if ( !($context["clean"] ?? null)) {
                // line 36
                echo "      </div>
    </div>
    ";
            }
            // line 39
            echo "  </section>
";
        }
    }

    public function getTemplateName()
    {
        return "themes/contrib/bootstrap_barrio/templates/layout/region--full-width.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 39,  73 => 36,  71 => 35,  66 => 34,  61 => 32,  56 => 31,  54 => 30,  49 => 29,  47 => 28,  45 => 25,  44 => 23,  42 => 19,  41 => 17,  39 => 15,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override to display a region.
 *
 * Available variables:
 * - content: The content for this region, typically blocks.
 * - attributes: HTML attributes for the region div.
 * - region: The name of the region variable as defined in the theme's
 *   .info.yml file.
 *
 * @see template_preprocess_region()
 */
#}
{% set wrapper_attribute = create_attribute() %}
{%
  set wrapper_classes = [
    'full-width',
    'region-wrapper-' ~ region|clean_class,
  ]
%}
{%
  set classes = [
    'region',
    'region-' ~ region|clean_class,
  ]
%}
{% if content %}
  <section{{ wrapper_attribute.addClass(wrapper_classes) }}>
    {% if not clean %}
    <div class={{ container }}>
      <div{{ attributes.addClass(classes) }}>
    {% endif %}
        {{ content }}
    {% if not clean %}
      </div>
    </div>
    {% endif %}
  </section>
{% endif %}
", "themes/contrib/bootstrap_barrio/templates/layout/region--full-width.html.twig", "/var/www/public_html/themes/contrib/bootstrap_barrio/templates/layout/region--full-width.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 15, "if" => 28);
        static $filters = array("clean_class" => 19, "escape" => 29);
        static $functions = array("create_attribute" => 15);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['clean_class', 'escape'],
                ['create_attribute']
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
