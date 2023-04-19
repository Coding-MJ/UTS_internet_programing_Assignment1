CREATE DATABASE assignment;
use assignment;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `product_id` int(10) unsigned DEFAULT NULL,
  `category_name` varchar(20) DEFAULT NULL,
  `subcategory_name` varchar(20) DEFAULT NULL,
  `product_name` varchar(20) DEFAULT NULL,
  `unit_price` float(8,2) DEFAULT NULL,
  `unit_quantity` varchar(15) DEFAULT NULL,
  `in_stock` int(10) unsigned DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of products
-- ----------------------------
BEGIN;
INSERT INTO `products` VALUES (1000, 'frozen', 'Fish Fingers', 'Fish Fingers', 2.55, '500 gram', 1500);
INSERT INTO `products` VALUES (1001, 'frozen', 'Fish Fingers', 'Fish Fingers', 5.00, '1000 gram', 750);
INSERT INTO `products` VALUES (1002, 'frozen', 'Hamburger Patties', 'Hamburger Patties', 2.35, 'Pack 10', 1200);
INSERT INTO `products` VALUES (1003, 'frozen', 'Shelled Prawns', 'Shelled Prawns', 6.90, '250 gram', 300);
INSERT INTO `products` VALUES (1004, 'frozen', 'Tub Ice Cream', 'Tub Ice Cream', 1.80, 'I Litre', 800);
INSERT INTO `products` VALUES (1005, 'frozen', 'Tub Ice Cream', 'Tub Ice Cream', 3.40, '2 Litre', 1200);
INSERT INTO `products` VALUES (2000, 'health', 'Panadol', 'Panadol', 3.00, 'Pack 24', 2000);
INSERT INTO `products` VALUES (2001, 'health', 'Panadol', 'Panadol', 5.50, 'Bottle 50', 1000);
INSERT INTO `products` VALUES (2002, 'health', 'Bath Soap', 'Bath Soap', 2.60, 'Pack 6', 500);
INSERT INTO `products` VALUES (2003, 'health', 'Garbage Bags', 'Garbage Bags Small', 1.50, 'Pack 10', 500);
INSERT INTO `products` VALUES (2004, 'health', 'Garbage Bags', 'Garbage Bags Large', 5.00, 'Pack 50', 300);
INSERT INTO `products` VALUES (2005, 'health', 'Washing Powder', 'Washing Powder', 4.00, '1000 gram', 800);
INSERT INTO `products` VALUES (3000, 'fresh', 'Cheddar Cheese', 'Cheddar Cheese', 8.00, '500 gram', 1000);
INSERT INTO `products` VALUES (3001, 'fresh', 'Cheddar Cheese', 'Cheddar Cheese', 15.00, '1000 gram', 1000);
INSERT INTO `products` VALUES (3002, 'fresh', 'T Bone Steak', 'T Bone Steak', 7.00, '1000 gram', 200);
INSERT INTO `products` VALUES (3003, 'fresh', 'Navel Oranges', 'Navel Oranges', 3.99, 'Bag 20', 200);
INSERT INTO `products` VALUES (3004, 'fresh', 'Bananas', 'Bananas', 1.49, 'Kilo', 400);
INSERT INTO `products` VALUES (3005, 'fresh', 'Peaches', 'Peaches', 2.99, 'Kilo', 500);
INSERT INTO `products` VALUES (3006, 'fresh', 'Grapes', 'Grapes', 3.50, 'Kilo', 200);
INSERT INTO `products` VALUES (3007, 'fresh', 'Apples', 'Apples', 1.99, 'Kilo', 500);
INSERT INTO `products` VALUES (4000, 'beverage', 'Earl Grey Tea Bags', 'Earl Grey Tea Bags', 2.49, 'Pack 25', 1200);
INSERT INTO `products` VALUES (4001, 'beverage', 'Earl Grey Tea Bags', 'Earl Grey Tea Bags', 7.25, 'Pack 100', 1200);
INSERT INTO `products` VALUES (4002, 'beverage', 'Earl Grey Tea Bags', 'Earl Grey Tea Bags', 13.00, 'Pack 200', 800);
INSERT INTO `products` VALUES (4003, 'beverage', 'Instant Coffee', 'Instant Coffee', 2.89, '200 gram', 500);
INSERT INTO `products` VALUES (4004, 'beverage', 'Instant Coffee', 'Instant Coffee', 5.10, '500 gram', 500);
INSERT INTO `products` VALUES (4005, 'beverage', 'Chocolate Bar', 'Chocolate Bar', 2.50, '500 gram', 300);
INSERT INTO `products` VALUES (5000, 'pet', 'Dry Dog Food', 'Dry Dog Food', 5.95, '5 kg Pack', 400);
INSERT INTO `products` VALUES (5001, 'pet', 'Dry Dog Food', 'Dry Dog Food', 1.95, '1 kg Pack', 400);
INSERT INTO `products` VALUES (5002, 'pet', 'Bird Food', 'Bird Food', 3.99, '500g packet', 200);
INSERT INTO `products` VALUES (5003, 'pet', 'Cat Food', 'Cat Food', 2.00, '500g tin', 200);
INSERT INTO `products` VALUES (5004, 'pet', 'Fish Food', 'Fish Food', 3.00, '500g packet', 200);
INSERT INTO `products` VALUES (2006, 'health', 'Laundry Bleach', 'Laundry Bleach', 3.55, '2 Litre Bottle', 500);
COMMIT;
