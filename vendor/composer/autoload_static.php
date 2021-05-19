<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit50a1ebd694d85192ee6ba80a5f68b52a
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twig\\' => 5,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Polyfill\\Ctype\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twig\\' => 
        array (
            0 => __DIR__ . '/..' . '/twig/twig/src',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Symfony\\Polyfill\\Ctype\\Ctype' => __DIR__ . '/..' . '/symfony/polyfill-ctype/Ctype.php',
        'Symfony\\Polyfill\\Mbstring\\Mbstring' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/Mbstring.php',
        'Twig\\Cache\\CacheInterface' => __DIR__ . '/..' . '/twig/twig/src/Cache/CacheInterface.php',
        'Twig\\Cache\\FilesystemCache' => __DIR__ . '/..' . '/twig/twig/src/Cache/FilesystemCache.php',
        'Twig\\Cache\\NullCache' => __DIR__ . '/..' . '/twig/twig/src/Cache/NullCache.php',
        'Twig\\Compiler' => __DIR__ . '/..' . '/twig/twig/src/Compiler.php',
        'Twig\\Environment' => __DIR__ . '/..' . '/twig/twig/src/Environment.php',
        'Twig\\Error\\Error' => __DIR__ . '/..' . '/twig/twig/src/Error/Error.php',
        'Twig\\Error\\LoaderError' => __DIR__ . '/..' . '/twig/twig/src/Error/LoaderError.php',
        'Twig\\Error\\RuntimeError' => __DIR__ . '/..' . '/twig/twig/src/Error/RuntimeError.php',
        'Twig\\Error\\SyntaxError' => __DIR__ . '/..' . '/twig/twig/src/Error/SyntaxError.php',
        'Twig\\ExpressionParser' => __DIR__ . '/..' . '/twig/twig/src/ExpressionParser.php',
        'Twig\\ExtensionSet' => __DIR__ . '/..' . '/twig/twig/src/ExtensionSet.php',
        'Twig\\Extension\\AbstractExtension' => __DIR__ . '/..' . '/twig/twig/src/Extension/AbstractExtension.php',
        'Twig\\Extension\\CoreExtension' => __DIR__ . '/..' . '/twig/twig/src/Extension/CoreExtension.php',
        'Twig\\Extension\\DebugExtension' => __DIR__ . '/..' . '/twig/twig/src/Extension/DebugExtension.php',
        'Twig\\Extension\\EscaperExtension' => __DIR__ . '/..' . '/twig/twig/src/Extension/EscaperExtension.php',
        'Twig\\Extension\\ExtensionInterface' => __DIR__ . '/..' . '/twig/twig/src/Extension/ExtensionInterface.php',
        'Twig\\Extension\\GlobalsInterface' => __DIR__ . '/..' . '/twig/twig/src/Extension/GlobalsInterface.php',
        'Twig\\Extension\\OptimizerExtension' => __DIR__ . '/..' . '/twig/twig/src/Extension/OptimizerExtension.php',
        'Twig\\Extension\\ProfilerExtension' => __DIR__ . '/..' . '/twig/twig/src/Extension/ProfilerExtension.php',
        'Twig\\Extension\\RuntimeExtensionInterface' => __DIR__ . '/..' . '/twig/twig/src/Extension/RuntimeExtensionInterface.php',
        'Twig\\Extension\\SandboxExtension' => __DIR__ . '/..' . '/twig/twig/src/Extension/SandboxExtension.php',
        'Twig\\Extension\\StagingExtension' => __DIR__ . '/..' . '/twig/twig/src/Extension/StagingExtension.php',
        'Twig\\Extension\\StringLoaderExtension' => __DIR__ . '/..' . '/twig/twig/src/Extension/StringLoaderExtension.php',
        'Twig\\FileExtensionEscapingStrategy' => __DIR__ . '/..' . '/twig/twig/src/FileExtensionEscapingStrategy.php',
        'Twig\\Lexer' => __DIR__ . '/..' . '/twig/twig/src/Lexer.php',
        'Twig\\Loader\\ArrayLoader' => __DIR__ . '/..' . '/twig/twig/src/Loader/ArrayLoader.php',
        'Twig\\Loader\\ChainLoader' => __DIR__ . '/..' . '/twig/twig/src/Loader/ChainLoader.php',
        'Twig\\Loader\\FilesystemLoader' => __DIR__ . '/..' . '/twig/twig/src/Loader/FilesystemLoader.php',
        'Twig\\Loader\\LoaderInterface' => __DIR__ . '/..' . '/twig/twig/src/Loader/LoaderInterface.php',
        'Twig\\Markup' => __DIR__ . '/..' . '/twig/twig/src/Markup.php',
        'Twig\\NodeTraverser' => __DIR__ . '/..' . '/twig/twig/src/NodeTraverser.php',
        'Twig\\NodeVisitor\\AbstractNodeVisitor' => __DIR__ . '/..' . '/twig/twig/src/NodeVisitor/AbstractNodeVisitor.php',
        'Twig\\NodeVisitor\\EscaperNodeVisitor' => __DIR__ . '/..' . '/twig/twig/src/NodeVisitor/EscaperNodeVisitor.php',
        'Twig\\NodeVisitor\\MacroAutoImportNodeVisitor' => __DIR__ . '/..' . '/twig/twig/src/NodeVisitor/MacroAutoImportNodeVisitor.php',
        'Twig\\NodeVisitor\\NodeVisitorInterface' => __DIR__ . '/..' . '/twig/twig/src/NodeVisitor/NodeVisitorInterface.php',
        'Twig\\NodeVisitor\\OptimizerNodeVisitor' => __DIR__ . '/..' . '/twig/twig/src/NodeVisitor/OptimizerNodeVisitor.php',
        'Twig\\NodeVisitor\\SafeAnalysisNodeVisitor' => __DIR__ . '/..' . '/twig/twig/src/NodeVisitor/SafeAnalysisNodeVisitor.php',
        'Twig\\NodeVisitor\\SandboxNodeVisitor' => __DIR__ . '/..' . '/twig/twig/src/NodeVisitor/SandboxNodeVisitor.php',
        'Twig\\Node\\AutoEscapeNode' => __DIR__ . '/..' . '/twig/twig/src/Node/AutoEscapeNode.php',
        'Twig\\Node\\BlockNode' => __DIR__ . '/..' . '/twig/twig/src/Node/BlockNode.php',
        'Twig\\Node\\BlockReferenceNode' => __DIR__ . '/..' . '/twig/twig/src/Node/BlockReferenceNode.php',
        'Twig\\Node\\BodyNode' => __DIR__ . '/..' . '/twig/twig/src/Node/BodyNode.php',
        'Twig\\Node\\CheckSecurityCallNode' => __DIR__ . '/..' . '/twig/twig/src/Node/CheckSecurityCallNode.php',
        'Twig\\Node\\CheckSecurityNode' => __DIR__ . '/..' . '/twig/twig/src/Node/CheckSecurityNode.php',
        'Twig\\Node\\CheckToStringNode' => __DIR__ . '/..' . '/twig/twig/src/Node/CheckToStringNode.php',
        'Twig\\Node\\DeprecatedNode' => __DIR__ . '/..' . '/twig/twig/src/Node/DeprecatedNode.php',
        'Twig\\Node\\DoNode' => __DIR__ . '/..' . '/twig/twig/src/Node/DoNode.php',
        'Twig\\Node\\EmbedNode' => __DIR__ . '/..' . '/twig/twig/src/Node/EmbedNode.php',
        'Twig\\Node\\Expression\\AbstractExpression' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/AbstractExpression.php',
        'Twig\\Node\\Expression\\ArrayExpression' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/ArrayExpression.php',
        'Twig\\Node\\Expression\\ArrowFunctionExpression' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/ArrowFunctionExpression.php',
        'Twig\\Node\\Expression\\AssignNameExpression' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/AssignNameExpression.php',
        'Twig\\Node\\Expression\\Binary\\AbstractBinary' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Binary/AbstractBinary.php',
        'Twig\\Node\\Expression\\Binary\\AddBinary' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Binary/AddBinary.php',
        'Twig\\Node\\Expression\\Binary\\AndBinary' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Binary/AndBinary.php',
        'Twig\\Node\\Expression\\Binary\\BitwiseAndBinary' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Binary/BitwiseAndBinary.php',
        'Twig\\Node\\Expression\\Binary\\BitwiseOrBinary' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Binary/BitwiseOrBinary.php',
        'Twig\\Node\\Expression\\Binary\\BitwiseXorBinary' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Binary/BitwiseXorBinary.php',
        'Twig\\Node\\Expression\\Binary\\ConcatBinary' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Binary/ConcatBinary.php',
        'Twig\\Node\\Expression\\Binary\\DivBinary' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Binary/DivBinary.php',
        'Twig\\Node\\Expression\\Binary\\EndsWithBinary' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Binary/EndsWithBinary.php',
        'Twig\\Node\\Expression\\Binary\\EqualBinary' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Binary/EqualBinary.php',
        'Twig\\Node\\Expression\\Binary\\FloorDivBinary' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Binary/FloorDivBinary.php',
        'Twig\\Node\\Expression\\Binary\\GreaterBinary' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Binary/GreaterBinary.php',
        'Twig\\Node\\Expression\\Binary\\GreaterEqualBinary' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Binary/GreaterEqualBinary.php',
        'Twig\\Node\\Expression\\Binary\\InBinary' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Binary/InBinary.php',
        'Twig\\Node\\Expression\\Binary\\LessBinary' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Binary/LessBinary.php',
        'Twig\\Node\\Expression\\Binary\\LessEqualBinary' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Binary/LessEqualBinary.php',
        'Twig\\Node\\Expression\\Binary\\MatchesBinary' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Binary/MatchesBinary.php',
        'Twig\\Node\\Expression\\Binary\\ModBinary' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Binary/ModBinary.php',
        'Twig\\Node\\Expression\\Binary\\MulBinary' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Binary/MulBinary.php',
        'Twig\\Node\\Expression\\Binary\\NotEqualBinary' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Binary/NotEqualBinary.php',
        'Twig\\Node\\Expression\\Binary\\NotInBinary' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Binary/NotInBinary.php',
        'Twig\\Node\\Expression\\Binary\\OrBinary' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Binary/OrBinary.php',
        'Twig\\Node\\Expression\\Binary\\PowerBinary' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Binary/PowerBinary.php',
        'Twig\\Node\\Expression\\Binary\\RangeBinary' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Binary/RangeBinary.php',
        'Twig\\Node\\Expression\\Binary\\SpaceshipBinary' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Binary/SpaceshipBinary.php',
        'Twig\\Node\\Expression\\Binary\\StartsWithBinary' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Binary/StartsWithBinary.php',
        'Twig\\Node\\Expression\\Binary\\SubBinary' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Binary/SubBinary.php',
        'Twig\\Node\\Expression\\BlockReferenceExpression' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/BlockReferenceExpression.php',
        'Twig\\Node\\Expression\\CallExpression' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/CallExpression.php',
        'Twig\\Node\\Expression\\ConditionalExpression' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/ConditionalExpression.php',
        'Twig\\Node\\Expression\\ConstantExpression' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/ConstantExpression.php',
        'Twig\\Node\\Expression\\FilterExpression' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/FilterExpression.php',
        'Twig\\Node\\Expression\\Filter\\DefaultFilter' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Filter/DefaultFilter.php',
        'Twig\\Node\\Expression\\FunctionExpression' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/FunctionExpression.php',
        'Twig\\Node\\Expression\\GetAttrExpression' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/GetAttrExpression.php',
        'Twig\\Node\\Expression\\InlinePrint' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/InlinePrint.php',
        'Twig\\Node\\Expression\\MethodCallExpression' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/MethodCallExpression.php',
        'Twig\\Node\\Expression\\NameExpression' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/NameExpression.php',
        'Twig\\Node\\Expression\\NullCoalesceExpression' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/NullCoalesceExpression.php',
        'Twig\\Node\\Expression\\ParentExpression' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/ParentExpression.php',
        'Twig\\Node\\Expression\\TempNameExpression' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/TempNameExpression.php',
        'Twig\\Node\\Expression\\TestExpression' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/TestExpression.php',
        'Twig\\Node\\Expression\\Test\\ConstantTest' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Test/ConstantTest.php',
        'Twig\\Node\\Expression\\Test\\DefinedTest' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Test/DefinedTest.php',
        'Twig\\Node\\Expression\\Test\\DivisiblebyTest' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Test/DivisiblebyTest.php',
        'Twig\\Node\\Expression\\Test\\EvenTest' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Test/EvenTest.php',
        'Twig\\Node\\Expression\\Test\\NullTest' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Test/NullTest.php',
        'Twig\\Node\\Expression\\Test\\OddTest' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Test/OddTest.php',
        'Twig\\Node\\Expression\\Test\\SameasTest' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Test/SameasTest.php',
        'Twig\\Node\\Expression\\Unary\\AbstractUnary' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Unary/AbstractUnary.php',
        'Twig\\Node\\Expression\\Unary\\NegUnary' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Unary/NegUnary.php',
        'Twig\\Node\\Expression\\Unary\\NotUnary' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Unary/NotUnary.php',
        'Twig\\Node\\Expression\\Unary\\PosUnary' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/Unary/PosUnary.php',
        'Twig\\Node\\Expression\\VariadicExpression' => __DIR__ . '/..' . '/twig/twig/src/Node/Expression/VariadicExpression.php',
        'Twig\\Node\\FlushNode' => __DIR__ . '/..' . '/twig/twig/src/Node/FlushNode.php',
        'Twig\\Node\\ForLoopNode' => __DIR__ . '/..' . '/twig/twig/src/Node/ForLoopNode.php',
        'Twig\\Node\\ForNode' => __DIR__ . '/..' . '/twig/twig/src/Node/ForNode.php',
        'Twig\\Node\\IfNode' => __DIR__ . '/..' . '/twig/twig/src/Node/IfNode.php',
        'Twig\\Node\\ImportNode' => __DIR__ . '/..' . '/twig/twig/src/Node/ImportNode.php',
        'Twig\\Node\\IncludeNode' => __DIR__ . '/..' . '/twig/twig/src/Node/IncludeNode.php',
        'Twig\\Node\\MacroNode' => __DIR__ . '/..' . '/twig/twig/src/Node/MacroNode.php',
        'Twig\\Node\\ModuleNode' => __DIR__ . '/..' . '/twig/twig/src/Node/ModuleNode.php',
        'Twig\\Node\\Node' => __DIR__ . '/..' . '/twig/twig/src/Node/Node.php',
        'Twig\\Node\\NodeCaptureInterface' => __DIR__ . '/..' . '/twig/twig/src/Node/NodeCaptureInterface.php',
        'Twig\\Node\\NodeOutputInterface' => __DIR__ . '/..' . '/twig/twig/src/Node/NodeOutputInterface.php',
        'Twig\\Node\\PrintNode' => __DIR__ . '/..' . '/twig/twig/src/Node/PrintNode.php',
        'Twig\\Node\\SandboxNode' => __DIR__ . '/..' . '/twig/twig/src/Node/SandboxNode.php',
        'Twig\\Node\\SetNode' => __DIR__ . '/..' . '/twig/twig/src/Node/SetNode.php',
        'Twig\\Node\\TextNode' => __DIR__ . '/..' . '/twig/twig/src/Node/TextNode.php',
        'Twig\\Node\\WithNode' => __DIR__ . '/..' . '/twig/twig/src/Node/WithNode.php',
        'Twig\\Parser' => __DIR__ . '/..' . '/twig/twig/src/Parser.php',
        'Twig\\Profiler\\Dumper\\BaseDumper' => __DIR__ . '/..' . '/twig/twig/src/Profiler/Dumper/BaseDumper.php',
        'Twig\\Profiler\\Dumper\\BlackfireDumper' => __DIR__ . '/..' . '/twig/twig/src/Profiler/Dumper/BlackfireDumper.php',
        'Twig\\Profiler\\Dumper\\HtmlDumper' => __DIR__ . '/..' . '/twig/twig/src/Profiler/Dumper/HtmlDumper.php',
        'Twig\\Profiler\\Dumper\\TextDumper' => __DIR__ . '/..' . '/twig/twig/src/Profiler/Dumper/TextDumper.php',
        'Twig\\Profiler\\NodeVisitor\\ProfilerNodeVisitor' => __DIR__ . '/..' . '/twig/twig/src/Profiler/NodeVisitor/ProfilerNodeVisitor.php',
        'Twig\\Profiler\\Node\\EnterProfileNode' => __DIR__ . '/..' . '/twig/twig/src/Profiler/Node/EnterProfileNode.php',
        'Twig\\Profiler\\Node\\LeaveProfileNode' => __DIR__ . '/..' . '/twig/twig/src/Profiler/Node/LeaveProfileNode.php',
        'Twig\\Profiler\\Profile' => __DIR__ . '/..' . '/twig/twig/src/Profiler/Profile.php',
        'Twig\\RuntimeLoader\\ContainerRuntimeLoader' => __DIR__ . '/..' . '/twig/twig/src/RuntimeLoader/ContainerRuntimeLoader.php',
        'Twig\\RuntimeLoader\\FactoryRuntimeLoader' => __DIR__ . '/..' . '/twig/twig/src/RuntimeLoader/FactoryRuntimeLoader.php',
        'Twig\\RuntimeLoader\\RuntimeLoaderInterface' => __DIR__ . '/..' . '/twig/twig/src/RuntimeLoader/RuntimeLoaderInterface.php',
        'Twig\\Sandbox\\SecurityError' => __DIR__ . '/..' . '/twig/twig/src/Sandbox/SecurityError.php',
        'Twig\\Sandbox\\SecurityNotAllowedFilterError' => __DIR__ . '/..' . '/twig/twig/src/Sandbox/SecurityNotAllowedFilterError.php',
        'Twig\\Sandbox\\SecurityNotAllowedFunctionError' => __DIR__ . '/..' . '/twig/twig/src/Sandbox/SecurityNotAllowedFunctionError.php',
        'Twig\\Sandbox\\SecurityNotAllowedMethodError' => __DIR__ . '/..' . '/twig/twig/src/Sandbox/SecurityNotAllowedMethodError.php',
        'Twig\\Sandbox\\SecurityNotAllowedPropertyError' => __DIR__ . '/..' . '/twig/twig/src/Sandbox/SecurityNotAllowedPropertyError.php',
        'Twig\\Sandbox\\SecurityNotAllowedTagError' => __DIR__ . '/..' . '/twig/twig/src/Sandbox/SecurityNotAllowedTagError.php',
        'Twig\\Sandbox\\SecurityPolicy' => __DIR__ . '/..' . '/twig/twig/src/Sandbox/SecurityPolicy.php',
        'Twig\\Sandbox\\SecurityPolicyInterface' => __DIR__ . '/..' . '/twig/twig/src/Sandbox/SecurityPolicyInterface.php',
        'Twig\\Source' => __DIR__ . '/..' . '/twig/twig/src/Source.php',
        'Twig\\Template' => __DIR__ . '/..' . '/twig/twig/src/Template.php',
        'Twig\\TemplateWrapper' => __DIR__ . '/..' . '/twig/twig/src/TemplateWrapper.php',
        'Twig\\Test\\IntegrationTestCase' => __DIR__ . '/..' . '/twig/twig/src/Test/IntegrationTestCase.php',
        'Twig\\Test\\NodeTestCase' => __DIR__ . '/..' . '/twig/twig/src/Test/NodeTestCase.php',
        'Twig\\Token' => __DIR__ . '/..' . '/twig/twig/src/Token.php',
        'Twig\\TokenParser\\AbstractTokenParser' => __DIR__ . '/..' . '/twig/twig/src/TokenParser/AbstractTokenParser.php',
        'Twig\\TokenParser\\ApplyTokenParser' => __DIR__ . '/..' . '/twig/twig/src/TokenParser/ApplyTokenParser.php',
        'Twig\\TokenParser\\AutoEscapeTokenParser' => __DIR__ . '/..' . '/twig/twig/src/TokenParser/AutoEscapeTokenParser.php',
        'Twig\\TokenParser\\BlockTokenParser' => __DIR__ . '/..' . '/twig/twig/src/TokenParser/BlockTokenParser.php',
        'Twig\\TokenParser\\DeprecatedTokenParser' => __DIR__ . '/..' . '/twig/twig/src/TokenParser/DeprecatedTokenParser.php',
        'Twig\\TokenParser\\DoTokenParser' => __DIR__ . '/..' . '/twig/twig/src/TokenParser/DoTokenParser.php',
        'Twig\\TokenParser\\EmbedTokenParser' => __DIR__ . '/..' . '/twig/twig/src/TokenParser/EmbedTokenParser.php',
        'Twig\\TokenParser\\ExtendsTokenParser' => __DIR__ . '/..' . '/twig/twig/src/TokenParser/ExtendsTokenParser.php',
        'Twig\\TokenParser\\FlushTokenParser' => __DIR__ . '/..' . '/twig/twig/src/TokenParser/FlushTokenParser.php',
        'Twig\\TokenParser\\ForTokenParser' => __DIR__ . '/..' . '/twig/twig/src/TokenParser/ForTokenParser.php',
        'Twig\\TokenParser\\FromTokenParser' => __DIR__ . '/..' . '/twig/twig/src/TokenParser/FromTokenParser.php',
        'Twig\\TokenParser\\IfTokenParser' => __DIR__ . '/..' . '/twig/twig/src/TokenParser/IfTokenParser.php',
        'Twig\\TokenParser\\ImportTokenParser' => __DIR__ . '/..' . '/twig/twig/src/TokenParser/ImportTokenParser.php',
        'Twig\\TokenParser\\IncludeTokenParser' => __DIR__ . '/..' . '/twig/twig/src/TokenParser/IncludeTokenParser.php',
        'Twig\\TokenParser\\MacroTokenParser' => __DIR__ . '/..' . '/twig/twig/src/TokenParser/MacroTokenParser.php',
        'Twig\\TokenParser\\SandboxTokenParser' => __DIR__ . '/..' . '/twig/twig/src/TokenParser/SandboxTokenParser.php',
        'Twig\\TokenParser\\SetTokenParser' => __DIR__ . '/..' . '/twig/twig/src/TokenParser/SetTokenParser.php',
        'Twig\\TokenParser\\TokenParserInterface' => __DIR__ . '/..' . '/twig/twig/src/TokenParser/TokenParserInterface.php',
        'Twig\\TokenParser\\UseTokenParser' => __DIR__ . '/..' . '/twig/twig/src/TokenParser/UseTokenParser.php',
        'Twig\\TokenParser\\WithTokenParser' => __DIR__ . '/..' . '/twig/twig/src/TokenParser/WithTokenParser.php',
        'Twig\\TokenStream' => __DIR__ . '/..' . '/twig/twig/src/TokenStream.php',
        'Twig\\TwigFilter' => __DIR__ . '/..' . '/twig/twig/src/TwigFilter.php',
        'Twig\\TwigFunction' => __DIR__ . '/..' . '/twig/twig/src/TwigFunction.php',
        'Twig\\TwigTest' => __DIR__ . '/..' . '/twig/twig/src/TwigTest.php',
        'Twig\\Util\\DeprecationCollector' => __DIR__ . '/..' . '/twig/twig/src/Util/DeprecationCollector.php',
        'Twig\\Util\\TemplateDirIterator' => __DIR__ . '/..' . '/twig/twig/src/Util/TemplateDirIterator.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit50a1ebd694d85192ee6ba80a5f68b52a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit50a1ebd694d85192ee6ba80a5f68b52a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit50a1ebd694d85192ee6ba80a5f68b52a::$classMap;

        }, null, ClassLoader::class);
    }
}
