<?php

/*
 * The MIT License
 *
 * Copyright 2020 Everton.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
namespace Uid;

/**
 * Unique id generator class.
 *
 * @author Everton
 */
final class Uid
{

    /**
     *
     * @var int|null Armazena a última sequência inteira gerada.
     */
    private static ?int $intSequence = null;

    /**
     * Produz um uid inteiro.
     *
     * @param int $start Início da sequência. Se fornecido será utilizado como primeiro uid gerado. Padrão é 0.
     * @return int Retorna um inteiro imediatamente posterior ao último gerado ou ao fornecido em $start.
     */
    public static function intSequence(int $start = 0): int
    {
        if (is_null(self::$intSequence)) {
            self::$intSequence = $start;
            return self::$intSequence;
        }

        self::$intSequence++;
        return (int) self::$intSequence;
    }

    /**
     * Reinicia a sequência controlada por Uid\Uid::intSequence().
     *
     * @return void
     */
    public static function resetIntSequence(): void
    {
        self::$intSequence = null;
    }

    /**
     * Retorna um uid no formato de string de tamanho fixo, contendo apenas letras e números.
     *
     * @param int $length Se fornecido, indica qual é o tamanho da sequência. O padrão é 32.
     *
     * @return string Retorna uma string do tamanho de $length contendo apenas letras e números.
     */
    public static function text(int $length = 32): string
    {
        return substr(md5(time() . rand(0, getrandmax())), 0, $length);
    }
}
