<?php
/**
 * RsaTest
 * Rsa sdk api测试类
 */

namespace JROpen\Tests;

use JROpen\Service\Rsa;
use \PHPUnit\Framework\TestCase;

class RsaTest extends TestCase
{
    public function testEncrypt()
    {
        $publicKey = '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCnOO0TldQisEkTffzNoDhNdqYg
63nx3VpSQePw+2+HWx5N+d5tWKjQatkkKiEaPFAvvM9OUQ0g1+dnFhxrZZAeXjir
OcpXf/WdwFfyKzBAsIzUBvIpuxFnF8nZ0nwUbnUb2Jtu9nIijEPRQ8hMqNzt9Ebi
b98tA6kQPDINfS9qSQIDAQAB
-----END PUBLIC KEY-----';
        $data = [
            'test' => 1,
        ];

        $sign = Rsa::encrypt($data, $publicKey);
        $this->assertNotEmpty($sign);
        return $sign;
    }

    /**
     * @depends testEncrypt
     */
    public function testDecrypt($sign)
    {
        $privateKey = '-----BEGIN PRIVATE KEY-----
MIICdQIBADANBgkqhkiG9w0BAQEFAASCAl8wggJbAgEAAoGBAKc47ROV1CKwSRN9
/M2gOE12piDrefHdWlJB4/D7b4dbHk353m1YqNBq2SQqIRo8UC+8z05RDSDX52cW
HGtlkB5eOKs5yld/9Z3AV/IrMECwjNQG8im7EWcXydnSfBRudRvYm272ciKMQ9FD
yEyo3O30RuJv3y0DqRA8Mg19L2pJAgMBAAECgYAE6WolSiBaCH2NAgVb8NnWhKaq
juAdF5hglCji2i/TdPy146IB6jnDLXBFXKtuPtlIHa6lKUJOdakJYR/ik7Ag+Awj
CHyxp69o1iuf0tUfLhPTU2gZ/kLjf3sjY8QG0yp97iZNGZG+6/gyhcQIqp9Vcdqy
9oyN0FnDAZsKs2dn1QJBANvjCRxuTXrTrPmAwrEI9FzVXKthRs8UsHE8RAr/TojP
aWYVG6q1bk7abD2VyJgk7msFwKoLmrqMiBKnJN4pe0sCQQDCr6ed/ofGfLOGi+pl
ajBfjUF3kcOfIumrH30wfeQxRlUjXd04eXr12U3jrgDaU7eQrrzNeI9fYHDXN544
4AA7AkAcVLhLzXp2JOfYjdqH7NtvSp5SBoqVC9lf/Z/WuuZngjHWUUnrSM0Zo9Lm
bHIYCEofx/H29t/MwWaW4KpDZZzZAkAzqwyQGMoN+nBmx+FIUvtNkJ6MTiodpNVg
7fV6lh6mmSTlQvcAEvV4I9jREQ/24Xr5Mfa3jUR3qo+n/oHGVGSbAkAQ/v5kNFwz
kak+HiV2XVnVJrm0ovjTl6EXTCX9Yyl8wcQlpxMhfKY8gT7MWk1md8Nl6ph8+FL6
3oA2UY2LN+Oy
-----END PRIVATE KEY-----';

        $data = Rsa::decrypt($sign, $privateKey);
        return $this->assertEquals($data['test'], 1);
    }
}
