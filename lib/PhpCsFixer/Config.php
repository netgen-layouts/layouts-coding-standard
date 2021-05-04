<?php

declare(strict_types=1);

namespace Netgen\Layouts\CodingStandard\PhpCsFixer;

use PhpCsFixer\Config as BaseConfig;
use function array_merge;

final class Config extends BaseConfig
{
    public function __construct(string $name = 'default')
    {
        parent::__construct($name);

        $this->setCodeStyleRules();
    }

    /**
     * @param array<string, mixed> $rules
     */
    public function addRules(array $rules): self
    {
        $this->setRules(array_merge($this->getRules(), $rules));

        return $this;
    }

    private function setCodeStyleRules(): void
    {
        $this
            ->setRiskyAllowed(true)
            ->setRules(
                [
                    '@PSR12' => true,
                    '@PSR12:risky' => true,
                    '@PhpCsFixer' => true,
                    '@PhpCsFixer:risky' => true,

                    // Overrides for rules included in PhpCsFixer rule sets
                    'concat_space' => ['spacing' => 'one'],
                    'method_chaining_indentation' => false,
                    'multiline_whitespace_before_semicolons' => false,
                    'native_function_invocation' => ['include' => ['@all']],
                    'no_superfluous_phpdoc_tags' => false,
                    'no_unset_on_property' => false,
                    'ordered_imports' => ['imports_order' => ['class', 'function', 'const'], 'sort_algorithm' => 'alpha'],
                    'php_unit_internal_class' => false,
                    'php_unit_test_case_static_method_calls' => ['call_type' => 'self'],
                    'php_unit_test_class_requires_covers' => false,
                    'phpdoc_align' => false,
                    'phpdoc_types_order' => ['null_adjustment' => 'always_last', 'sort_algorithm' => 'none'],
                    'single_line_comment_style' => false,
                    'yoda_style' => false,

                    // Additional rules
                    'date_time_immutable' => true,
                    'declare_strict_types' => true,
                    'global_namespace_import' => [
                        'import_classes' => null,
                        'import_constants' => true,
                        'import_functions' => true,
                    ],
                    'heredoc_indentation' => ['indentation' => 'same_as_start'],
                    'mb_str_functions' => true,
                    'native_constant_invocation' => true,
                    'nullable_type_declaration_for_default_null_value' => true,
                    'static_lambda' => true,
                    'ternary_to_null_coalescing' => true,
                    'use_arrow_functions' => true,
                ]
            );
    }
}
