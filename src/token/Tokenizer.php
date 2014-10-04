<?php
namespace php\token;

class Tokenizer {

	public static $IMPORT_STATEMENTS = [T_REQUIRE, T_REQUIRE_ONCE, T_INCLUDE, T_INCLUDE_ONCE];

	public static $KEYWORDS = [T_ABSTRACT, T_CASE, T_CLASS, T_FUNCTION, T_CLONE, T_CONST, T_EXTENDS, T_FINAL, T_GLOBAL, T_IMPLEMENTS, T_INTERFACE, T_NAMESPACE, T_NEW, T_PRIVATE, T_PUBLIC, T_PROTECTED, T_THROW, T_TRAIT, T_USE];
	public static $BLOCKS = [T_IF, T_ELSEIF, T_ELSE, T_FOR, T_FOREACH, T_WHILE, T_DO, T_SWITCH, T_TRY, T_CATCH];
	public static $CASTS = [T_ARRAY_CAST, T_BOOL_CAST, T_DOUBLE_CAST, T_INT_CAST, T_OBJECT_CAST, T_STRING_CAST, T_UNSET_CAST];
// 	public static $ASSIGNMENTS = [T_AND_EQUAL, T_CONCAT_EQUAL, T_DIV_EQUAL, T_MINUS_EQUAL, T_MOD_EQUAL, T_MUL_EQUAL, T_OR_EQUAL, T_PLUS_EQUAL, T_SL_EQUAL, T_SR_EQUAL, T_XOR_EQUAL];
// 	public static $OPERATORS = [T_BOOLEAN_AND, T_BOOLEAN_OR, T_INSTANCEOF, T_IS_EQUAL, T_IS_GREATER_OR_EQUAL, T_IS_IDENTICAL, T_IS_NOT_EQUAL, T_IS_NOT_IDENTICAL, T_IS_SMALLER_OR_EQUAL, T_LOGICAL_AND, T_LOGICAL_OR, T_LOGICAL_XOR, T_SL, T_SR];
	public static $ASSIGNMENTS = ['=', '&=', '.=', '/=', '-=', '%=', '*=', '|=', '+=', '**=', '<<=', '>>=', '^='];
	public static $OPERATORS = ['&', '&&', 'and', '|', '||', 'or', '^', 'xor', 'instanceof', '==', '>=', '>', '===', '!=', '<>', '!==', '<=', '<', '<<', '>>', '+', '-', '*', '/', '**', 'as'];
	public static $STRUCTURAL = [T_CLASS, T_INTERFACE, T_TRAIT, T_FUNCTION];
	public static $STRUCTS = [T_CLASS, T_INTERFACE, T_TRAIT];
	public static $LINE_CONTEXT = ['echo', 'global', 'static', 'yield', 'case'];

	public function __construct() {
	}

	/**
	 * Tokenizes a given code
	 * 
	 * @param string $code
	 * @return TokenCollection
	 */
	public function tokenize($code) {
		$tokens = new TokenCollection();
		foreach (token_get_all($code) as $token) {
			$tokens->add(new Token($token));
		}

		return $tokens;
	}
}
