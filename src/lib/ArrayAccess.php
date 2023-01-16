<?php


namespace okcoder\think\helper\lib;


class ArrayAccess
{
    /**
     * 数组自动提取字段
     * @param array $input
     * @param array $column_keys
     * @param string|null $index_key
     * @return array
     */
    public static function columns(array $input, array $column_keys = [], string $index_key = null): array
    {
        $key = $input[$index_key] ?? null;
        if (!$column_keys && !$key) {
            return $input;
        }
        $result = [];
        foreach ($input as $k => $item) {
            if (in_array($k, $column_keys)) {
                $result[$k] = $item;
            }
        }
        if ($key) {
            return [$key => $result];
        }
        return $result;
    }
}