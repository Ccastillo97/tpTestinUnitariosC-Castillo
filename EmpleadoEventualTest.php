<?php
class EmpleadoEventualTest extends \PHPUnit\Framework\TestCase
{
	    private function crearEmpleadoEventual()
	{
		$eeven = new App\EmpleadoEventual("Cristian", "Castillo", 41931071, 22000,[50,60,70]);
		return $eeven;
	}
	public function testCalcularComision(){
		
		$eeven = $this->crearEmpleadoEventual();
		$this->assertEquals(3,$eeven->calcularComision());
	}
	
	public function testCalcularIngresoTotal(){
		
		$eeven = $this->crearEmpleadoEventual();
		$this->assertEquals(22003,$eeven->calcularIngresoTotal());
	}
	
	public function testCrearEmpleadoEventualMontoCeroONegativo()
	{
		$this->expectException(\Exception::class);
		$eeven = new App\EmpleadoEventual("Cristian", "Castillo", 41931071, 22000,[-50]);
		
	}

	
}
    
