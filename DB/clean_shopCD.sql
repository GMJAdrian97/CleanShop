-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 15-10-2024 a las 04:04:53
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clean_shop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calidad`
--

CREATE TABLE `calidad` (
  `id_calidad` int(11) NOT NULL,
  `descripcion_calidad` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Liquidos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_envios`
--

CREATE TABLE `detalle_envios` (
  `id_envio` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_sucursal_o` int(11) DEFAULT NULL,
  `id_sucursal_d` int(11) DEFAULT NULL,
  `cantidad` float DEFAULT NULL,
  `justificacion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id_venta_producto` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_sucursal` int(11) DEFAULT NULL,
  `cantidad_articulos` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

CREATE TABLE `envios` (
  `id_envio` int(11) NOT NULL,
  `tipo_producto` varchar(30) NOT NULL,
  `fecha` date DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `nombre_estado` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `nombre_estado`) VALUES
(1, 'Guanajuato');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `nombre_marca` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nombre_marca`) VALUES
(1, 'Fabuloso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id_municipio` int(11) NOT NULL,
  `nombre_municipio` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id_municipio`, `nombre_municipio`) VALUES
(1, 'Acambaro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(30) DEFAULT NULL,
  `img_producto` varchar(100) DEFAULT NULL,
  `descripcion_producto` varchar(100) DEFAULT NULL,
  `precio_adquisicion` float DEFAULT NULL,
  `precio_menudeo` float DEFAULT NULL,
  `precio_mayoreo` float DEFAULT NULL,
  `precio_vip` float DEFAULT NULL,
  `color_producto` varchar(30) DEFAULT NULL,
  `tipo_producto` varchar(30) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `id_sucursal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `img_producto`, `descripcion_producto`, `precio_adquisicion`, `precio_menudeo`, `precio_mayoreo`, `precio_vip`, `color_producto`, `tipo_producto`, `id_categoria`, `id_marca`, `id_proveedor`, `id_sucursal`) VALUES
(1, 'Fabuloso Lavanda', '1234567890987654321', 'Producto para trapear ', 20, 25, 23, 22, 'Morado', 'Pz', 1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nombre_proveedor` varchar(30) DEFAULT NULL,
  `telefono_proveedor` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre_proveedor`, `telefono_proveedor`) VALUES
(1, 'Patito', '1234567890');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_usuario`
--

CREATE TABLE `rol_usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_producto`
--

CREATE TABLE `stock_producto` (
  `id_producto` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `stock` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `id_sucursal` int(11) NOT NULL,
  `nombre_sucursal` varchar(30) DEFAULT NULL,
  `direccion_sucursal` varchar(60) DEFAULT NULL,
  `telefono_sucursal` varchar(15) DEFAULT NULL,
  `id_municipio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`id_sucursal`, `nombre_sucursal`, `direccion_sucursal`, `telefono_sucursal`, `id_municipio`) VALUES
(2, '1ra de mayo', '1ra de mayo', '1234567890', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nick_name` varchar(19) DEFAULT NULL,
  `nombre_usuario` varchar(50) DEFAULT NULL,
  `telefono_usuario` varchar(15) DEFAULT NULL,
  `direccion_usuario` varchar(100) DEFAULT NULL,
  `contraseña` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_productos`
--

CREATE TABLE `venta_productos` (
  `id_venta_producto` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `nombre_cliente` varchar(50) DEFAULT NULL,
  `tipo_comporbante` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calidad`
--
ALTER TABLE `calidad`
  ADD PRIMARY KEY (`id_calidad`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `detalle_envios`
--
ALTER TABLE `detalle_envios`
  ADD PRIMARY KEY (`id_producto`,`id_envio`),
  ADD KEY `fk_detenvios_envio` (`id_envio`),
  ADD KEY `fk_detenvios_sucursalo` (`id_sucursal_o`),
  ADD KEY `fk_detenvios_sucursald` (`id_sucursal_d`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id_venta_producto`,`id_producto`),
  ADD KEY `fk_detventa_prodcuto` (`id_producto`),
  ADD KEY `fk_detventa_sucursal` (`id_sucursal`);

--
-- Indices de la tabla `envios`
--
ALTER TABLE `envios`
  ADD PRIMARY KEY (`id_envio`),
  ADD KEY `fk_envios_usuarios_1` (`id_usuario`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id_municipio`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `fk_categoria_producto` (`id_categoria`),
  ADD KEY `fk_marca_producto` (`id_marca`),
  ADD KEY `fk_proveedor_producto` (`id_proveedor`),
  ADD KEY `fk_sucursal_producto` (`id_sucursal`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  ADD PRIMARY KEY (`id_usuario`,`id_rol`),
  ADD KEY `fk_usuario_rol_2` (`id_rol`);

--
-- Indices de la tabla `stock_producto`
--
ALTER TABLE `stock_producto`
  ADD PRIMARY KEY (`id_sucursal`,`id_producto`),
  ADD KEY `fk_stock_producto` (`id_producto`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`id_sucursal`),
  ADD KEY `fk_sucursal_muni1` (`id_municipio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `venta_productos`
--
ALTER TABLE `venta_productos`
  ADD PRIMARY KEY (`id_venta_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calidad`
--
ALTER TABLE `calidad`
  MODIFY `id_calidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `envios`
--
ALTER TABLE `envios`
  MODIFY `id_envio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id_municipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id_sucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `venta_productos`
--
ALTER TABLE `venta_productos`
  MODIFY `id_venta_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_envios`
--
ALTER TABLE `detalle_envios`
  ADD CONSTRAINT `fk_detenvios_envio` FOREIGN KEY (`id_envio`) REFERENCES `envios` (`id_envio`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_detenvios_porducti` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_detenvios_sucursald` FOREIGN KEY (`id_sucursal_d`) REFERENCES `sucursal` (`id_sucursal`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_detenvios_sucursalo` FOREIGN KEY (`id_sucursal_o`) REFERENCES `sucursal` (`id_sucursal`) ON DELETE CASCADE;

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `fk_detventa_prodcuto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_detventa_sucursal` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id_sucursal`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_detventa_venta` FOREIGN KEY (`id_venta_producto`) REFERENCES `venta_productos` (`id_venta_producto`) ON DELETE CASCADE;

--
-- Filtros para la tabla `envios`
--
ALTER TABLE `envios`
  ADD CONSTRAINT `fk_envios_usuarios_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_categoria_producto` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_marca_producto` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_proveedor_producto` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_sucursal_producto` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id_sucursal`) ON DELETE CASCADE;

--
-- Filtros para la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  ADD CONSTRAINT `fk_usuario_rol_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_usuario_rol_2` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE;

--
-- Filtros para la tabla `stock_producto`
--
ALTER TABLE `stock_producto`
  ADD CONSTRAINT `fk_stock_producto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_stock_sucursal` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id_sucursal`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD CONSTRAINT `fk_sucursal_muni1` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id_municipio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
