<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Artisan;

class SillasControllerTest extends TestCase
{
    use RefreshDatabase;
    public function setUp()
    {
        parent::setUp();
        Artisan::call('db:seed');
    }

    /**
     * Test del listado completo de sillas
     *
     * @return void
     */
    public function testSillasTraeTodas()
    {
        $response = $this->get('api/sillas');
        $response->assertStatus(200);
        $response->assertJson([]);
        $response->assertJsonCount(2);
        $response->assertJsonFragment([
            'id' => 1,
            'nombre' => 'Silla Aluminum de Charles Eames',
            'id_categoria' => '3',
        ]);
    }

    /**
     * Test crear una silla nueva
     * 
     * @return void
     */

    public function testCrearUnaSillaNuevaOk(){
        $response = $this->json('POST', '/api/nueva', [
            'id' => 10,
            'nombre' => 'Silla Loca de Prueba',
            'alto' => '110',
            'ancho' => '50',
            'profundidad' => '70',
            'descripcion' => 'La Silla Loca de prueba ha sido un diseño popular desde su introducción en 1958. Y no es de extrañar. Con una silueta elegante se puede utilizar en todo tipo de interiores; Desde hogares hasta oficinas. Dondequiera que se la coloque, esta sillas es un una declaración única sobre excelencia del diseño. Completamente tapizado en ecocuero y con una amplia opción de colores a tu disposición. Durante años, han intentado crear productos similares, pero nunca nadie pudo lograrlo. Si sos una apasionado del diseño y de los clásicos este producto no puede faltar en tu hogar.',
            'precio' => '12500',
            'id_categoria' => '3'
        ]);
        $response->assertStatus(200)
        ->assertJsonFragment([
            'status' => 'ok'
        ]);
    }

    /**
     * Test que valida los rechazos por error de validación. 
     * Rechaza la creación de una silla.
     *
     * @return void
     */
    public function testCrearUnaSillaNuevaInvalidaPorErroresDeValidacion(){
        $response = $this->json('POST', '/api/nueva', [
            'id' => 11,
            'nombre' => 'Silla Loca que no debería grabar'
        ]);
        $response->assertStatus(422)
        ->assertJsonValidationErrors([
            'alto', 'ancho', 'profundidad', 'descripcion', 'precio', 'id_categoria'
        ]);
    }

    /**
     * Edita una silla. Se entiende que vienen todos los datos, 
     *
     * @return void
     */
    public function testEditarUnaSilla(){

        $response = $this->json('POST', '/api/editar', [
            'id' => 1,
            'nombre' => 'Silla Loca de Prueba(ex eames)',
            'alto' => '999',
            'ancho' => '99',
            'profundidad' => '99',
            'descripcion' => 'La Silla Loca de prueba ha sido un diseño popular desde su introducción en 1958. Y no es de extrañar. Con una silueta elegante se puede utilizar en todo tipo de interiores; Desde hogares hasta oficinas. Dondequiera que se la coloque, esta sillas es un una declaración única sobre excelencia del diseño. Completamente tapizado en ecocuero y con una amplia opción de colores a tu disposición. Durante años, han intentado crear productos similares, pero nunca nadie pudo lograrlo. Si sos una apasionado del diseño y de los clásicos este producto no puede faltar en tu hogar.',
            'precio' => '9999',
            'id_categoria' => '3'
        ]);
        $response->assertStatus(200)
        ->assertJsonFragment([
            'nombre' => 'Silla Loca de Prueba(ex eames)',
            'precio' => '9999',
            'id_categoria' => '3'
        ]);

    }

    /**
     * Elimina correctamente una silla. Devuelve un OK
     *
     * @return void
     */
    public function testEliminarUnaSilla(){
        
        $response = $this->json('DELETE', '/api/eliminar', [
            'id' => '5'
        ]);

        $response->assertStatus(200) 
            ->assertJsonFragment([
            'status' => 'ok']);
    }


    /**
     * Valida que devuelva correctamente un mensaje de error cuando el id enviado no coincida con ninguno existente
     *
     * @return void
     */
    public function testChequearErrorAlEliminarUnaSillaConIdInvalido(){
        
        $response = $this->json('DELETE', '/api/eliminar', [
            'id' => '-55'
        ]);

        $response->assertStatus(200) 
            ->assertJsonFragment([
                'status' => 'No existe silla con el id asociado'
            ]);
    }
    
}
