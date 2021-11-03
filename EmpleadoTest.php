<?php
class EmpleadoTest extends \PHPUnit\Framework\TestCase
{
    private function crearEmpleado()
	{
		$e = new App\Empleado("Castillo", "Crisitan", 41931071, 22000,"ventas");
		return $e;
	}
	
	public function testRetornaNombreYApellido()
	{
		$e = $this->crearEmpleado();
		$this->assertEquals("Castillo Crisitan",$e->getNombreApellido());
	}
	public function testGetDNI(){
		$e = $this->crearEmpleado();
		$this->assertEquals(41931071,$e->getDNI());
	}
	public function testGetSalario(){
		$e = $this->crearEmpleado();
		$this->assertEquals(22000,$e->getSalario());
	}
	public function testSetSector(){
		$e = $this->crearEmpleado();
		$e->setSector("deposito");
		$this->assertEquals("deposito",$e->getSector());
	}
	public function testConvierteEmpleadoEnCadena(){
		$e = $this->crearEmpleado();
		$this->assertEquals("Crisitan Castillo 41931071 22000",(string) $e);
	}
	public function testCrearEmpleadoConNombreVacio()
	{
		$this->expectException(\Exception::class);
		$e = new App\Empleado("", "Castillo", 41931071, 22000,"ventas");
		
		
	}
		public function testCrearEmpleadoConApellidoVacio()
	{
		$this->expectException(\Exception::class);
		$e = new App\Empleado("Crisitan", "", 41931071, 22000,"ventas");
		
		
	}
		public function testCrearEmpleadoConDNIVacio()
	{
		$this->expectException(\Exception::class);
		$e = new App\Empleado("Castillo", "Crisitan","", 22000,"ventas");
		
		
	}
		public function testCrearEmpleadoConSalarioVacio()
	{
		$this->expectException(\Exception::class);
		$e = new App\Empleado("Crisitan", "Castillo", 41931071, "","ventas");
		
		
	}
		public function testCrearEmpleadoConDNIConLetras()
	{
		$this->expectException(\Exception::class);
		$e = new App\Empleado("Crisitan", "Castillo", "kjhbkbdfh", 22000,"ventas");
		
	}
		public function testSetSectorNoEspecificado(){
		$e = new App\Empleado("Crisitan", "Castillo", 41931071, 22000);
		$this->assertEquals("No especificado",$e->getSector());
	}
	
}