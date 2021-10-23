-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 20, 2021 at 08:43 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pokedex`
--

-- --------------------------------------------------------

--
-- Table structure for table `pokemon`
--

CREATE TABLE `pokemon` (
  `id` int(8) NOT NULL,
  `numero` int(11) NOT NULL,
  `sprite` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `tipo1` varchar(50) NOT NULL,
  `tipo2` varchar(50) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pokemon`
--

INSERT INTO `pokemon` (`id`, `numero`, `sprite`, `nombre`, `imagen`, `tipo1`, `tipo2`, `descripcion`) VALUES
(1, 1, 'bulbasaur.png', 'bulbasaur', 'bulbasaur.jpg', 'tipo_planta.gif', 'tipo_veneno.gif', 'Bulbasaur es un Pokémon cuadrúpedo y de color verde que posee manchas algo más oscuras con distintas formas geométricas. Su cabeza representa cerca de un tercio de su cuerpo. En su frente se ubican tres manchas que pueden cambiar de posición, forma o lugar dependiendo del ejemplar. Tiene como orejas muñones pequeños y puntiagudos. Sus ojos son grandes y de color rojo. Sus patas son cortas y posee tres garras en cada una. Este Pokémon tiene plantado un bulbo en el lomo desde que nace. Esta semilla crece y se desarrolla a lo largo del ciclo de vida de Bulbasaur a medida que suceden sus evoluciones. El bulbo absorbe y almacena la energía solar que Bulbasaur necesita para crecer. Dicen que cuanta más luz consuma la semilla, más olor producirá cuando se abra. Por otro lado, gracias a los nutrientes que el bulbo almacena, puede pasar varios días sin comer. Su cuerpo según a palabras de Ken Sugimori y Junichi Masuda en una entrevista, está basado en un anfibio (sapo o rana), al igual que toda su línea evolutiva.3\r\nEl bulbo de Bulbasaur le ayuda a defenderse de los enemigos, y desde él puede disparar ataques tales como rayo solar y drenadoras entre otros.\r\nNo es muy raro encontrarlo en jardines y zonas cercanas a fuentes de agua, tomando el sol. También suele encontrarse en zonas boscosas profundas. Se los puede atraer con el aroma de las flores. Bulbasaur es omnívoro, aunque si no encuentra comida su bulbo absorbe la energía del sol para hacer la fotosíntesis, y le permite pasar días sin comer. Dicen que en las mañanas su bulbo se abre y atrapa al primer Pokémon que caiga por su irresistible olor.\r\nEste contenido proviene de wikidex.net, y debe darse atribución a sus autores, tal como especifica la licencia.\r\nSe prohíbe su uso a PlagioDex (el wiki de FANDOOM), por copiar reiteradamente sin dar atribución'),
(2, 2, 'ivysaur.png', 'ivysaur', 'ivysaur.jpg', 'tipo_planta.gif', 'tipo_veneno.gif', 'Ivysaur posee un color azulado más vivo que el de su preevolución, Bulbasaur. Además, sus ojos se mantienen rojos y sus pupilas negras. El bulbo que había en la espalda de Bulbasaur se abre mostrando una flor, la cual aún permanece cerrada. Esta flor es usada por Ivysaur de la misma forma que Bulbasaur empleaba su bulbo para la mayoría de sus ataques. La flor crece con la exposición directa al sol, forzando a Ivysaur a caminar a todas horas para conseguir que la luz sea absorbida plenamente. Inversamente al bulbo que anteriormente nutría a Bulbasaur, parece ser que ahora la flor toma la energía de Ivysaur. De la flor emana un aroma suave y agradable, que con frecuencia atrae a personas y a otros Pokémon. Su cuerpo según a palabras de Ken Sugimori y Junichi Masuda en una entrevista, esta basado en un anfibio (sapo o rana), al igual que toda su línea evolutiva. 3\r\nTiene como costumbre exponerse por largo tiempo al sol para que la flor en su lomo comience a desarrollarse. Esta flor necesita constantemente absorber energía y nutrientes para fortalecerse y prepararse para su última etapa evolutiva. Para soportar su peso y su tronco, sus patas crecen muy fuertes. Si pasa un tiempo bajo la luz solar, es una señal de que muy pronto su brote será una gran flor.\r\nEl hábitat natural de esta especie es la pradera, aunque también viven en llanuras con fuentes de agua dulce expuestas al sol y algunos en bosques soleados para tener acceso constante a la luz.\r\nEste contenido proviene de wikidex.net, y debe darse atribución a sus autores, tal como especifica la licencia.\r\nSe prohíbe su uso a PlagioDex (el wiki de FANDOOM), por copiar reiteradamente sin dar atribución');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
