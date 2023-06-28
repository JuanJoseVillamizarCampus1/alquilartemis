//obras

obra_id,
cliente_id,
nombre_obra,


//productos

producto_id,
nombre,
descripcion,
codigo

//salida 

salida_id,
cliente_id,
fecha_salida,
hora_salida,
subtotalPeso,
empleado_id,
placatransporte,
observaciones

//salida_detalle

salida_id,
producto_id,
obra_id,
cantidad_salida,
cantidad_propia,
cantidad_subalquilada,
valorUnidad,
fecha_standBye,
estado,
valorTotal,
empleado_id

//entrada

entrada_id,
salida_id,
empleado_id,
cliente_id,
fecha_entrada,
hora_entrada,
observaciones

//entrada_detalle

entrada_id,
producto_id,
obra_id,
entrada_cantidad,
entrada_cantidad_propia,
entrada_cantidad_subalquilada,
estado

//inventario
producto_id,
CantidaInicial,
CantidadIngresos,
CantidadSalidas,
CantidadFinal,
FechaInventario,
TipoOperacion
