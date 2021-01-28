-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-01-2021 a las 06:48:47
-- Versión del servidor: 10.4.16-MariaDB
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `miss_muffin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacion_postre`
--

CREATE TABLE `clasificacion_postre` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `url_photo` varchar(300) NOT NULL,
  `descripcion` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clasificacion_postre`
--

INSERT INTO `clasificacion_postre` (`id`, `nombre`, `url_photo`, `descripcion`) VALUES
(1, 'Galletería', 'https://cdn.kiwilimon.com/recetaimagen/3329/38990.jpg', 'Que ricas estan las galletas jejeje'),
(2, 'Tartas', 'img/tarta.jpg', 'Postre tradicionalmente redondo compuesto de una o mas capas de masa dulce cocida al horno, decoradas con diversos ingredientes'),
(3, 'Vasitos', 'img/vasito.jpg', 'Descripcion base'),
(4, 'Postres Mexicanos', 'img/mexicano.jpg', 'Descripcion base'),
(5, 'Brownies', 'img/brownie.jpg', 'Descripcion base'),
(6, 'Trufas', 'img/trufa.jpg', 'Descripcion base'),
(7, 'Cheese Cake', 'img/cheesecake.png', 'Descripcion base'),
(8, 'Postres Decorados', 'img/decorado.jpg', 'Descripcion base'),
(9, 'Pasteleria de Especialidad', 'img/especialidad.jpg', 'Descripcion base'),
(10, 'Veganos', 'img/vegano.jpg', 'Descripcion base'),
(11, 'Fresas', 'img/fresas.jpg', 'Descripcion base'),
(12, 'Cupcakes', 'img/cupcakes.jpg', 'Descripcion base'),
(13, 'Confiteria', 'img/confiteria.jpg', 'Descripcion base'),
(14, 'Para Compartir', 'img/compartir.jpg', 'Descripcion base'),
(15, 'Rebanadas de Pastel', 'img/rebanada.jpg', 'Descripcion base'),
(16, 'Panaderia', 'img/panaderia.jpg', 'Descripcion base'),
(17, 'Petit Four', 'img/petit_four.jpg', 'Descripcion base'),
(18, 'Para Regalar', 'img/regalar.jpg', 'Descripcion base'),
(19, 'Mostachones', 'img/mostachon.jpg', 'Descripcion base');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` longtext NOT NULL,
  `precio` int(11) NOT NULL,
  `url_photo` varchar(300) NOT NULL,
  `disponible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `categoria_id`, `nombre`, `descripcion`, `precio`, `url_photo`, `disponible`) VALUES
(1, 1, 'Galleta Vainilla', 'Deliciosa galleta sabor a vainilla', 10, 'https://sevilla.abc.es/gurme/wp-content/uploads/sites/24/2014/04/receta-galletas-caseras.jpg', 1),
(2, 1, 'Galleta Oreo ', 'Deliciosa galleta sabor a oreo', 3, 'https://i.blogs.es/632f11/640px-oreo-two-cookies/450_1000.jpg', 1),
(3, 2, 'Tarta de Manzana', 'Deliciosa tarta sabor manzana', 30, 'https://www.annarecetasfaciles.com/files/dsc02212-1.jpg', 1),
(4, 1, 'Besito de Nuez', 'Delicioso besito de nuez', 3, 'img/Galletas.png', 1),
(5, 1, 'Galleta de Red Velvet', 'Deliciosa galleta de red velvet', 3, 'img/Galletas.png', 1),
(6, 1, 'Polvorón de Almendra', 'Delicioso polvoron de almendra', 3, 'img/Galletas.png', 1),
(7, 1, 'Polvorón de Naranja', 'Delicioso polvoron de naranja', 4, 'img/Galletas.png', 1),
(8, 1, 'Galleta de Coco', 'Deliciosa galleta de coco', 4, 'img/Galletas.png', 1),
(9, 1, 'Galleta Chocochips', 'Deliciosa galleta de chispas de chocolate', 4, 'img/Galletas.png', 1),
(10, 1, 'Galleta de Nutella', 'Deliciosa galleta de nutella', 4, 'img/Galletas.png', 1),
(11, 1, 'Pastisetas', 'Deliciosa pastiseta', 4, 'img/Galletas.png', 1),
(12, 1, 'Galleta de Avena y Chocolate', 'Deliciosa galleta de avena y chocolate', 4, 'img/Galletas.png', 1),
(13, 1, 'Alfajores Dulce de Leche', 'Delicioso dulce de leche', 5, 'img/Galletas.png', 1),
(14, 2, 'Nuez', 'Deliciosa tarta de nuez', 10, 'img/tarta.jpg', 1),
(15, 2, 'Plátano con Chocolate', 'Deliciosa tarta de plátano con chocolate', 10, 'img/tarta.jpg', 1),
(16, 2, 'Queso de Bola con Guayaba', 'Deliciosa tarta de queso de bola con guayaba', 12, 'img/tarta.jpg', 1),
(17, 2, 'Queso de Bola con Nutella', 'Deliciosa tarta de queso de bola con nutella', 12, 'img/tarta.jpg', 1),
(18, 2, 'Frutas de Temporada', 'Deliciosa tarta de frutas de temporada', 12, 'img/tarta.jpg', 1),
(19, 2, 'Manzana con Crumbe', 'Deliciosa tarta de manzana con crumbe', 12, 'img/tarta.jpg', 1),
(20, 2, 'Limon', 'Deliciosa tarta de limon', 12, 'img/tarta.jpg', 1),
(21, 2, 'Frutos Rojos', 'Deliciosa tarta de frutos rojos', 13, 'img/tarta.jpg', 1),
(22, 2, 'Frambuesa con Chocolate Blanco', 'Deliciosa tarta de frambuesa con chocolate blanco', 13, 'img/tarta.jpg', 1),
(23, 2, 'Nutella con Ferrero', 'Deliciosa tarta de nutella con ferrero', 13, 'img/tarta.jpg', 1),
(24, 3, 'Tiramisú', 'Delicioso vasito de tiramisú', 12, 'img/vasito.jpg', 1),
(25, 3, 'Pan de Zanahoria', 'Delicioso vasito de pan de zanahoria', 12, 'img/vasito.jpg', 1),
(26, 3, 'Mostachón', 'Delicioso vasito de mostachón', 12, 'img/vasito.jpg', 1),
(27, 3, 'Mousse Triple Chocolate', 'Delicioso vasito de mousse triple chocolate', 12, 'img/vasito.jpg', 1),
(28, 3, 'Pastel de Tres Leches', 'Delicioso vasito de pastel de tres leches', 12, 'img/vasito.jpg', 1),
(29, 3, 'Red Velvet', 'Delicioso vasito de red velvet', 12, 'img/vasito.jpg', 1),
(30, 3, 'Creme Brulle', 'Delicioso vasito de creme brulle', 12, 'img/vasito.jpg', 1),
(31, 3, 'Mousse de Mutella', 'Delicioso vasito de mousse de nutella', 12, 'img/vasito.jpg', 1),
(32, 3, 'Mousse de Fresa', 'Delicioso vasito de mousse de fresa', 12, 'img/vasito.jpg', 1),
(33, 3, 'Pancotta Piña Colada', 'Delicioso vasito de pancotta piña colada', 12, 'img/vasito.jpg', 1),
(34, 3, 'Pancotta Vainilla', 'Delicioso vasito de pancotta vainilla', 12, 'img/vasito.jpg', 1),
(35, 8, 'Cake Pops Bodas', 'Deliciosos cake pops para bodas', 14, 'img/Decorado.jpg', 1),
(36, 8, 'Cake Pops Decorados Fondant', 'Deliciosos cake pops decorados con fondant', 15, 'img/Decorado.jpg', 1),
(37, 8, 'Galletas Decoradas Chicas (5cm)', 'Deliciosas galletas chicas decoradas', 12, 'img/Decorado.jpg', 1),
(38, 8, 'Galletas Decoradas Medianas (8cm)', 'Deliciosas galletas medianas decoradas', 16, 'img/Decorado.jpg', 1),
(39, 8, 'Galletas Decoradas Grandes (10-12cm)', 'Deliciosas galletas grandes decoradas', 20, 'img/Decorado.jpg', 1),
(40, 8, 'Paleta Cheese Cake Tipo Magnum Decorada Fondant', 'Deliciosas paletas de cheese cake tipo magnum decoradas con fondant', 14, 'img/Decorado.jpg', 1),
(41, 8, 'Paleta Cheese Cake Tipo Magnum Boda', 'Deliciosas paletas de cheese cake tipo magnum para bodas', 16, 'img/Decorado.jpg', 1),
(42, 8, 'Cupcakes Sencillos', 'Deliciosos cupcakes sencillos', 15, 'img/Decorado.jpg', 1),
(43, 8, 'Cupcakes con Decorados Elaborados', 'Deliciosos cupcakes con decorados elaborados **Aplica restricciones', 20, 'img/Decorado.jpg', 1),
(44, 9, 'Merenguitos', 'Deliciosos merenguitos', 2, 'img/especialidad.jpg', 1),
(45, 9, 'Choux/Profiteroles', 'Deliciosos profiteroles', 10, 'img/especialidad.jpg', 1),
(46, 9, 'Pavlovas de Frutas', 'Deliciosas pavlovas de frutas', 10, 'img/especialidad.jpg', 1),
(47, 9, 'Mil Hojas', 'Deliciosas mil hojas', 15, 'img/especialidad.jpg', 1),
(48, 9, 'Ópera', 'Deliciosa ópera', 15, 'img/especialidad.jpg', 1),
(49, 10, 'Donas de Chocolate', 'Deliciosas donas de chocolate', 10, 'img/vegano.jpg', 1),
(50, 10, 'Galletas de Almendra', 'Deliciosas galletas de almendra', 12, 'img/vegano.jpg', 1),
(51, 10, 'Mousse de Chocolate', 'Delicioso mousse de chocolate', 12, 'img/vegano.jpg', 1),
(52, 10, 'Trufas', 'Deliciosas trufas', 12, 'img/vegano.jpg', 1),
(53, 10, 'Tarta de Fresa o Chocolate', 'Deliciosa tarta de fresa o chocolate', 12, 'img/vegano.jpg', 1),
(54, 11, 'Chocolate Blanco', 'Deliciosas fresas con chocolate blanco', 12, 'img/fresas.jpg', 1),
(55, 11, 'Chocolate Oscuro', 'Deliciosas fresas con chocolate oscuro', 12, 'img/fresas.jpg', 1),
(56, 11, 'Doradas', 'Deliciosas fresas doradas', 13, 'img/fresas.jpg', 1),
(57, 11, 'Con Topping', 'Deliciosas fresas con toppings de nuez, coco o chocolate', 12, 'img/fresas.jpg', 1),
(58, 12, 'Mini Cupcakes Zanahoria', 'Deliciosos mini cupcakes de zanahoria', 6, 'img/cupcakes.jpg', 1),
(59, 12, 'Mini Cupcakes Platano', 'Deliciosos mini cupcakes de platano', 6, 'img/cupcakes.jpg', 1),
(60, 12, 'Mini Cupcakes Red Velvet', 'Deliciosos mini cupcakes de red velvet', 6, 'img/cupcakes.jpg', 1),
(61, 12, 'Mini Cupcakes Chocolate con Oreo', 'Deliciosos mini cupcakes de chocolate con oreo', 6, 'img/cupcakes.jpg', 1),
(62, 12, 'Mini Cupcakes de Café', 'Deliciosos mini cupcakes de café', 6, 'img/cupcakes.jpg', 1),
(63, 12, 'Mini Cupcakes Blueberry', 'Deliciosos mini cupcakes de blueberry', 6, 'img/cupcakes.jpg', 1),
(64, 13, 'Pretzel Cubierto de Chocolate', 'Delicioso pretzel cubierto de chocolate', 3, 'img/confiteria.jpg', 1),
(65, 13, 'Enjambres', 'Deliciosos enjambres', 5, 'img/confiteria.jpg', 1),
(66, 13, 'Mediants de Chocolate', 'Deliciosos mediant de chocolate', 6, 'img/confiteria.jpg', 1),
(67, 13, 'Paletas de Merengue', 'Deliciosas paletas de merengue', 10, 'img/confiteria.jpg', 1),
(68, 13, 'Bombones de Chocolate', 'Deliciosos bombones de chocolate', 12, 'img/confiteria.jpg', 1),
(69, 13, 'Barras de Chocolate', 'Deliciosas barras de chocolate', 12, 'img/confiteria.jpg', 1),
(70, 14, 'Mostachón con Fresa Chico', 'Delicioso mostachon chico con fresa', 165, 'img/compartir.jpg', 1),
(71, 15, 'Pastel Nutella con Cheese Cake', 'Delicioso pastel de nutella con cheese cake', 65, 'img/rebanada.jpg', 1),
(72, 15, 'Birthday Cake', 'Delicioso pastel de cumpleaños', 60, 'img/rebanada.jpg', 1),
(73, 16, 'Panque de Plátano Completo', 'Delicioso panque de platano', 220, 'img/panaderia.jpg', 1),
(74, 16, 'Rebanada de Panque de Plátano ', 'Deliciosa rebanada de panque de platano', 17, 'img/panaderia.jpg', 1),
(75, 16, 'Panque de Zanahoria Completo', 'Delicioso panque de zanahoria', 220, 'img/panaderia.jpg', 1),
(76, 16, 'Rebanada de Panque de Zanahoria', 'Deliciosa rebanada de panque de zanahoria', 17, 'img/panaderia.jpg', 1),
(77, 17, 'Mini Brownie', 'Delicioso mini brownie', 12, 'img/petit_four.jpg', 1),
(78, 17, 'Trufas de Red Velvet', 'Deliciosas trufas de red velvet', 12, 'img/petit_four.jpg', 1),
(79, 17, 'Trufas Macarron', 'Deliciosas trufas con macarron', 13, 'img/petit_four.jpg', 1),
(80, 17, 'Mini Cheese Cake con Brownie', 'Delicioso mini cheese cake con brownie', 13, 'img/petit_four.jpg', 1),
(81, 17, 'Mini Mostachón', 'Delicioso mini mostachón', 12, 'img/petit_four.jpg', 1),
(82, 17, 'Macarron Pistache', 'Delicioso macarron sabor pistache', 13, 'img/petit_four.jpg', 1),
(83, 17, 'Macarron Chocomenta', 'Delicioso macarron sabor chocomenta', 13, 'img/petit_four.jpg', 1),
(84, 17, 'Macarron Dulce de Leche', 'Delicioso Macarron de dulce de leche', 13, 'img/petit_four.jpg', 1),
(85, 17, 'Macarron Nutella', 'Delicioso macarron sabor nutella', 13, 'img/petit_four.jpg', 1),
(86, 17, 'Macarron Queso de Bola', 'Delicioso macarron con queso de bola', 13, 'img/petit_four.jpg', 1),
(87, 17, 'Macarron Red Velvet', 'Delicioso macarron sabor red velvet', 13, 'img/petit_four.jpg', 1),
(88, 18, 'Caja de 9 Fresas', 'Caja con 9 deliciosas fresas', 115, 'img/compartir.jpg', 1),
(89, 18, 'Caja de 9 Postres surtidos', 'Caja con 9 deliciosos postres surtidos', 120, 'img/compartir.jpg', 1),
(90, 18, 'Caja de 9 Trufas', 'Caja con 9 deliciosas trufas', 115, 'img/compartir.jpg', 1),
(91, 4, 'Buñuelos', 'Deliciosos buñuelos', 10, 'img/mexicano.jpg', 1),
(92, 4, 'Budín', 'Delicioso budín', 10, 'img/mexicano.jpg', 1),
(93, 4, 'Pan de Elote', 'Delicioso pan de elote', 12, 'img/mexicano.jpg', 1),
(94, 4, 'Churros de Chocolate', 'Deliciosos churros de chocolate', 12, 'img/mexicano.jpg', 1),
(95, 4, 'Caballeros Pobres', 'Deliciosos caballeros pobres', 12, 'img/mexicano.jpg', 1),
(96, 4, 'Vasito de Arroz con Leche', 'Deliciosos vasitos de arroz con leche', 12, 'img/mexicano.jpg', 1),
(97, 4, 'Leche Quemada de Coco', 'Deliciosa leche quemada de coco', 12, 'img/mexicano.jpg', 1),
(98, 4, 'Mantemuerto Relleno Queso Crema', 'Delicioso antemuerto relleno de queso crema', 17, 'img/mexicano.jpg', 1),
(99, 4, 'Flan', 'Delicioso flan', 12, 'img/mexicano.jpg', 1),
(100, 4, 'Queso Napolitano', 'Delicioso queso napolitano', 12, 'img/mexicano.jpg', 1),
(101, 5, 'Brownie con Azúcar Glass', 'Delicioso brownie con azúcar glass', 9, 'img/brownie.jpg', 1),
(102, 5, 'Brownie con Nutella', 'Delicioso brownie nutella', 10, 'img/brownie.jpg', 1),
(103, 5, 'Brownie Decorado con Fondant', 'Delicioso brownie decorado con fondant', 12, 'img/brownie.jpg', 1),
(104, 6, 'Red Velvet Chica', 'Deliciosa trufa chica de red velvet', 5, 'img/trufa.jpg', 1),
(105, 6, 'Red Velvet Grande', 'Deliciosa trufa grande de red velvet, se puede escoger un topping entre coco, nuez, cacahuate o pretzel', 10, 'img/trufa.jpg', 1),
(106, 7, 'Cheese Cake con Fresa Natural', 'Delicioso cheese cake con fresa natural', 12, 'img/Cheesecake.png', 1),
(107, 7, 'Cheese Cake con Brownie y Chocolate', 'Delicioso cheese cake con brownie y chocolate', 12, 'img/Cheesecake.png', 1),
(108, 7, 'Cheese Cake Dulce de Leche', 'Delicioso cheese cake con dulce de leche', 12, 'img/Cheesecake.png', 1),
(109, 7, 'Cheese Cake Queso de Bola', 'Delicioso cheese cake con queso de bola', 12, 'img/Cheesecake.png', 1),
(110, 19, 'Mostachón con Fresa Natural', 'Delicioso mostachon con fresa natural', 12, 'img/mostachon.jpg', 1),
(111, 19, 'Mostachón con Kiwi', 'Delicioso mostachon con kiwi', 12, 'img/mostachon.jpg', 1),
(112, 19, 'Mostachón con Frutos Rojos', 'Delicioso mostachon con frutos rojos', 12, 'img/mostachon.jpg', 1),
(113, 19, 'Mostachón con Platano', 'Delicioso mostachon con platano', 12, 'img/mostachon.jpg', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clasificacion_postre`
--
ALTER TABLE `clasificacion_postre`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clasificacion_postre`
--
ALTER TABLE `clasificacion_postre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `categoria de postre` FOREIGN KEY (`categoria_id`) REFERENCES `clasificacion_postre` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
