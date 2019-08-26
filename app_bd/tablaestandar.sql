create table FE_FAC_DETALLE(
	TipoDocumentoElectronico varchar(20),
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
	MontoTotalLinea  money,
	ExoneracionTipoDocumento  varchar(2),
	ExoneracionNumeroDocumento  varchar(40),
	ExoneracionNombreInstitucion varchar(200),
	ExoneracionFechaEmision date,
	ExoneracionPorcentajeExoneracion money,
	ExoneracionMontoExoneracion money
)

create table FE_FAC_FACTURAS(
	TipoDocumentoElectronico varchar(20),
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