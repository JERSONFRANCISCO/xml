create table FE_FAC_DETALLE_Julio(
	TipoDocumento varchar(20),
	NumeroConsecutivo varchar(50),
	NumeroLinea  varchar(20),
	Codigo  varchar(20),
	CodigoComercialTipo  varchar(20),
	CodigoComercialCodigo  varchar(20),
	Cantidad  money,
	UnidadMedida  varchar(50),
	UnidadMedidaComercial  varchar(50),
	Detalle  varchar(150),
	PrecioUnitario money,
	MontoTotal money,
	DescuentoMontoDescuento  money,
	DescuentoNaturalezaDescuento  varchar(50),
	SubTotal  money,
	ImpuestoCodigo  varchar(2),
	ImpuestoCodigoTarifa  varchar(2),
	ImpuestoTarifa  money,
	ImpuestoMonto  money,
	ImpuestoNeto  money,
	MontoTotalLinea  money
)

create table FE_FAC_FACTURAS_Julio(
	TipoDocumento varchar(20),
	Clave varchar(100),
	CodigoActividad varchar(50),
	NumeroConsecutivo varchar(50),
	FechaEmision date,
	EmisorNombre varchar(200),
	ReceptorNombre varchar(200),
	CodigoMoneda varchar(10),
	TotalServGravados money,
	TotalServExentos money,
	TotalServExonerado money,
	TotalMercanciasGravadas money,
	TotalMercanciasExentas money,
	TotalMercExonerada money,
	TotalGravado money,
	TotalExento money,
	TotalExonerado money,
	TotalVenta money,
	TotalDescuentos money, 
	TotalVentaNeta money,
	TotalImpuesto money,
	TotalComprobante money,
	OtroTexto varchar(2000)
)


-------------------------------------------------------------------------------------------------


create table FE_FAC_DETALLE_Junio(
	TipoDocumento varchar(20),
	NumeroConsecutivo varchar(50),
	NumeroLinea  varchar(20),
	Codigo  varchar(20),
	CodigoComercialTipo  varchar(20),
	CodigoComercialCodigo  varchar(20),
	Cantidad  money,
	UnidadMedida  varchar(50),
	UnidadMedidaComercial  varchar(50),
	Detalle  varchar(150),
	PrecioUnitario money,
	MontoTotal money,
	DescuentoMontoDescuento  money,
	DescuentoNaturalezaDescuento  varchar(50),
	SubTotal  money,
	ImpuestoCodigo  varchar(2),
	ImpuestoCodigoTarifa  varchar(2),
	ImpuestoTarifa  money,
	ImpuestoMonto  money,
	ImpuestoNeto  money,
	MontoTotalLinea  money
)

create table FE_FAC_FACTURAS_Junio(
	TipoDocumento varchar(20),
	Clave varchar(100),
	CodigoActividad varchar(50),
	NumeroConsecutivo varchar(50),
	FechaEmision date,
	EmisorNombre varchar(200),
	ReceptorNombre varchar(200),
	CodigoMoneda varchar(10),
	TotalServGravados money,
	TotalServExentos money,
	TotalServExonerado money,
	TotalMercanciasGravadas money,
	TotalMercanciasExentas money,
	TotalMercExonerada money,
	TotalGravado money,
	TotalExento money,
	TotalExonerado money,
	TotalVenta money,
	TotalDescuentos money, 
	TotalVentaNeta money,
	TotalImpuesto money,
	TotalComprobante money,
	OtroTexto varchar(2000)
)