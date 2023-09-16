-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2023 at 03:37 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be19_cr4_emelin_ bilajbegovic_biglibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `ISBN` int(15) NOT NULL,
  `short_description` varchar(700) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `author_first_name` varchar(255) NOT NULL,
  `author_last_name` varchar(255) NOT NULL,
  `publisher_name` varchar(255) NOT NULL,
  `publisher_adress` varchar(255) NOT NULL,
  `publisher_date` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`id`, `title`, `image`, `ISBN`, `short_description`, `type`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_adress`, `publisher_date`, `status`) VALUES
(1, 'Book Test', 'https://cdn.pixabay.com/photo/2018/01/17/18/43/book-3088775_1280.jpg', 978112233, 'To Kill a Mockingbird is a thought-provoking novel by Harper Lee, set in a small Southern town during the Great Depression. Through the innocent eyes of young Scout Finch, readers witness the complexities of racial injustice and moral growth. Atticus Finch, Scout\'s father and a principled lawyer, defends a black man accused of raping a white woman, defying societal norms. The narrative unfolds with themes of prejudice, empathy, and the search for truth. Lee\'s eloquent storytelling captivates the', 'Book', 'Author Test', 'Test last Name', 'HarperCollins', 'New York, USA', '1960-07-11', 1),
(2, 'The Great Gatsby', 'https://d28hgpri8am2if.cloudfront.net/book_images/onix/cvr9781524879761/the-great-gatsby-9781524879761_hr.jpg', 978445566, 'The Great Gatsby by F. Scott Fitzgerald is a gripping portrayal of 1920s America, exploring the opulence, love, and tragedy of Jay Gatsby pursuit of the alluring Daisy Buchanan, while delving into the illusions of wealth, the corruption of the American Dream, and the fleeting nature of happiness.', 'Book', 'F. Scott ', 'Fitzgerald', 'Scholastic', 'New York, USA', '1925-04-10', 0),
(3, '1984', 'https://m.media-amazon.com/images/I/81BExVLr8sL._AC_UY218_.jpg', 978225577, '\"1984\" by George Orwell is a dystopian novel set in a totalitarian society ruled by the oppressive Party led by Big Brother. The story follows Winston Smith, a Party member who secretly rebels against the regime\'s mind control and propaganda. As he seeks truth and individuality, Winston risks everything in a society where even thoughts are monitored and dissent is punished. Orwell\'s gripping narrative explores themes of surveillance, censorship, and the manipulation of truth. ', 'Book', 'George', 'Orwell', 'Scholastic', 'London, UK', '1949-06-08', 1),
(4, 'Harry Potter and the S.Stone', 'https://m.media-amazon.com/images/I/71u-cpucTRL._AC_UY218_.jpg', 978003355, '\"Harry Potter and the Sorcerers Stone\" is a captivating tale of a young wizard, Harry Potter, who discovers his magical heritage and embarks on an incredible journey at Hogwarts School of Witchcraft and Wizardry. Filled with friendship, adventure, and the battle between good and evil, this enchanting novel introduces readers to a world of spells, potions, and mythical creatures. With its charming characters and imaginative plot.', 'Book', 'J.K.', 'Rowling', 'Scholastic', 'New York, USA', '1997-06-26', 1),
(5, 'The Catcher in the Rye', 'https://www.savethecat.com/wp-content/uploads/2019/05/243a0ba33adbee20d3ed689fbf712ec8-jd-salinger-holden-caulfield.jpg', 978110088, '\"The Catcher in the Rye,\" a classic novel written by J.D. Salinger, is a timeless coming-of-age story that has captivated readers for generations. Published in 1951, the novel remains a significant work in American literature and is celebrated for its portrayal of adolescent alienation and rebellion against the adult world.', 'Book', 'J D', 'Salinger', 'Little, Brown and Company', 'Boston, USA', '1951-07-16', 0),
(6, 'Pride and Prejudice', 'https://m.media-amazon.com/images/I/61G0xX1io3L._AC_UY218_.jpg', 978020509, '\"Pride and Prejudice\" by Jane Austen is a timeless romance set in Regency-era England, where the spirited Elizabeth Bennet navigates societal expectations and clashes with the enigmatic Mr. Darcy. With wit, humor, and astute social commentary, Austen crafts a tale of love, self-discovery, and the triumph of true affection over societal conventions.', 'Book', 'Jane', 'Austen', 'Little, Brown and Company', 'London, UK', '1813-01-28', 0),
(7, 'The Shawshank Redemption', 'https://m.media-amazon.com/images/I/81SRZf+CXyL._AC_UY327_FMwebp_QL65_.jpg', 123456789, '\"The Shawshank Redemption\" is a gripping film adaptation of Stephen Kings novella, directed by Frank Darabont. Set in a harsh prison, it portrays the enduring friendship between Andy Dufresne and Red as they navigate injustice and hopelessness, triumphing over adversity and finding redemption amidst the darkest circumstances.', 'DVD', 'Frank', 'Darabont', 'Warner Bros.', 'Los Angeles, USA', '1994-09-23', 0),
(9, 'Moby-Dick', 'https://m.media-amazon.com/images/I/61guE9BQp0L._AC_UY218_.jpg', 978123456, '\"Moby-Dick\" by Herman Melville is a monumental American novel that follows Captain Ahab relentless quest for vengeance against the elusive white whale, Moby Dick. Amidst the harrowing whaling expedition, Melville weaves philosophical musings, intricate character studies, and captivating sea lore, creating an epic tale that explores themes of obsession, fate, and the complexities of the human spirit.', 'Book', 'Herman', 'Melville', 'Wordsworth Editions', 'New York, USA', '1851-10-18', 0),
(10, 'The Lord of the Rings', 'https://m.media-amazon.com/images/I/51t0Z0DfEfL._AC_UY218_.jpg', 978334455, '\"The Lord of the Rings\" is an epic fantasy trilogy by J.R.R. Tolkien, set in the enchanting world of Middle-earth. The story follows the perilous quest to destroy the One Ring, a powerful artifact that could bring darkness to the world. Frodo Baggins, a humble hobbit, is tasked with the burden of carrying the Ring, aided by a diverse fellowship of companions. As they traverse majestic landscapes and face formidable foes, the tale weaves themes of courage, friendship, and the battle between good and evil. Tolkien\'s masterful storytelling and richly imagined world have captured the hearts of readers, making it a timeless classic in the realm of fantasy literature.', 'Book', 'J.R.R.', 'Tolkien', 'Mariner Books', 'London, UK', '1954-07-29', 1),
(18, 'Once upon a time', 'https://cdn.pixabay.com/photo/2018/01/17/18/43/book-3088775_1280.jpg', 798010203, 'Here is a small description. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'CD', 'Richard', 'John', 'New Audio', 'New York, USA', '1986-05-01', 0),
(19, 'Emelins way to Paris', 'https://cdn.pixabay.com/photo/2013/11/28/10/36/road-220058_1280.jpg', 123456789, 'Hi this is my way to Paris and back home to Vienna.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. ', 'book', 'Emelin', 'Bilajbegovic', 'Warner Bros.', 'New York, USA', '1999-06-02', 0),
(20, 'The new way to study', 'https://cdn.pixabay.com/photo/2022/09/24/16/13/albert-einstein-7476672_1280.png', 798123456, 'Einsteins new book how to learn for your studies......Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'book', 'Professor', 'Einstein', 'Scholastic', 'London, UK', '2005-10-08', 0),
(21, 'Get a Full Stack Web Developer', 'https://cdn.pixabay.com/photo/2015/11/19/21/11/book-1052014_1280.jpg', 798554466, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'book', 'Emelin', 'Bilajbegovic', 'Brockhaus', 'Vienna, Austria', '1976-06-10', 0),
(22, 'The 48 Laws Of Power', 'https://m.media-amazon.com/images/I/411yaMigwbL._AC._SR360,460.jpg', 978186197, '\"The 48 Laws of Power\" by Robert Greene is a tour de force in the realm of personal and professional strategies. Drawing inspiration from historical figures, philosophers, and real-world anecdotes, Greene masterfully crafts a guidebook on the art of acquiring and wielding power. From cover to cover, this book offers a profound exploration of human behavior and the dynamics of influence.', 'book', 'Robert', 'Greene', 'Profile Books', 'London, UK', '2000-11-20', 1),
(23, 'Irresistible', 'https://m.media-amazon.com/images/I/41jYmEupmsL._SX310_BO1,204,203,200_.jpg', 978180081, 'Cuteness is an area where culture and biology get tangled up. Seeing a cute animal triggers some of the most powerful psychological instincts we have - the ones that elicit our care and protection - but there is a deeper story behind the broad appeal of Japanese cats and saccharine greetings cards.', 'book', 'Joshua Paul', 'Dale', 'Profile Books', 'London, UK', '2023-11-09', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
