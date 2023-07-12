SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `box_func` (
  `ID` int(11) NOT NULL,
  `label` text NOT NULL,
  `board` varchar(255) NOT NULL,
  `type` text NOT NULL,
  `pin` varchar(255) NOT NULL,
  `IO` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `command` (
  `id` int(11) NOT NULL,
  `board` varchar(255) NOT NULL,
  `d0` int(11) NOT NULL,
  `d1` int(11) NOT NULL,
  `d2` int(11) NOT NULL,
  `d3` int(11) NOT NULL,
  `d4` int(11) NOT NULL,
  `A0` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `espdata_1` (
  `id` int(11) NOT NULL,
  `humidity` float NOT NULL,
  `temperature` float NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `espdata_2` (
  `id` int(11) NOT NULL,
  `light` float NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `box_func`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `command`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `espdata_1`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `espdata_2`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `box_func`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `command`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `espdata_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `espdata_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;