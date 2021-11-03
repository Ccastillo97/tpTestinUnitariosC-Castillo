<?php
class EmpleadoPermanenteTest extends \PHPUnit\Framework\TestCase
{
	 private function crearEmpleadoPermanente()
	{
		$dt=new DateTime();
		$eper = new App\EmpleadoPermanente("Cristian", "Castillo", 41931071, 22000,$dt);
		return $eper;
	}
	
	public function testGetFechaIngreso(){
		
		$dt=new DateTime();
		$eper = $this->crearEmpleadoPermanente();
		$this->assertEquals($dt->format('Y-m-d'),$eper->getFechaIngreso()->format('Y-m-d'));
	} 
	
	public function testCalcularComision(){
		
		$dt=new DateTime('2016-01-10');
		$eper = new App\EmpleadoPermanente("Cristian", "Castillo", 41931071, 22000,$dt);
		$antiguedad = $dt->diff(new \DateTime());
		$antiguedad1="{$antiguedad->y}%";
		$this->assertEquals($antiguedad1,$eper->calcularComision());
		
	}
	public function testCalcularIngresoTotal(){
		
		$eper = $this->crearEmpleadoPermanente();
		$antiguedad = $eper->getFechaIngreso()->diff(new\DateTime());//
		$ingtotal=$eper->getSalario() + $eper->getSalario() * $antiguedad->y / 100;
		$this->assertEquals($ingtotal,$eper->calcularIngresoTotal());
		
	}
	
	public function testCalcularAntiguedadEmpConAntig(){
		
		$dt=new DateTime('2016-01-10');
		$eper = new App\EmpleadoPermanente("Cristian", "Castillo", 41931071, 22000,$dt);
		$antiguedad = $dt->diff(new\DateTime());// hago un diff con la fecha asignada y la fecha actual 
		$this->assertEquals($antiguedad->y,$eper->calcularAntiguedad());
	}
	
	public function testCrearEmpleadoSinFecha(){
		
		$eper = new App\EmpleadoPermanente("Cristian", "Castillo", 41931071, 22000);
		$dt=new DateTime();//creo una fecha actual para poder comparar con el resultado del metodo getFechaIngreso()
		$this->assertEquals($dt->format('Y-m-d'),$eper->getFechaIngreso()->format('Y-m-d'));
		$antiguedad = $dt->diff(new\DateTime());//hago un diff con las dos fechas que son iguales y el resultado es cero
		$this->assertEquals($antiguedad->y,$eper->calcularAntiguedad());
	}
	
	public function testCrearEmpleadoConFechaPosterior(){
		
		$dt=new DateTime('2020-01-10');
		$this->expectException(\Exception::class);
		$eper = new App\EmpleadoPermanente(Castillo, "Castillo", 41931071, 22000,$dt);
		
		
	}
}
