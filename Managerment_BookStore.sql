-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 01, 2024 lúc 03:40 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhasachpn`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `author`
--

CREATE TABLE `author` (
  `ID` int(11) NOT NULL,
  `AuthorName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `author`
--

INSERT INTO `author` (`ID`, `AuthorName`) VALUES
(1, 'Nguyễn Vĩnh Nguyên'),
(2, 'Đồng Đức Thành'),
(3, 'Phạm Công Luận'),
(4, 'Carla Valentine'),
(5, 'Dương Thụy'),
(6, 'Nguyễn Mạnh Hùng'),
(7, 'Nhật Chiêu'),
(8, 'Nguyễn Ngọc Tư'),
(9, 'Đặng Nguyễn Đông Vy'),
(10, 'Phạm Công Luận'),
(11, 'Hà Hương'),
(12, 'Đỗ Thanh Lam'),
(13, 'Thiềm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `CategoryName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`ID`, `CategoryName`) VALUES
(1, 'Truyện'),
(2, 'Sách giáo khoa'),
(3, 'Sách phật pháp'),
(4, 'Sách mềm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `evaluate`
--

CREATE TABLE `evaluate` (
  `ID` int(11) NOT NULL,
  `ProductID` char(10) DEFAULT NULL,
  `UserID` char(10) DEFAULT NULL,
  `Star` int(11) DEFAULT NULL,
  `Comment` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `evaluate`
--

INSERT INTO `evaluate` (`ID`, `ProductID`, `UserID`, `Star`, `Comment`) VALUES
(1, '1', '1', 5, 'hay'),
(5, '2', '1', 5, 'Truyen nay xuat sac'),
(8, '1', '2', 4, 'Tôi là Đức Đen. Tui đọc thấy cũng được nên cho 4* thôi nhé hehe'),
(9, '4', '1', 5, 'Hay quá em ơi'),
(10, '6', '2', 5, 'Truyện của Quang Thân lúc nào cũng hay'),
(12, '2', '3', 5, 'Tâm thấy rất hay nên cho 10đ'),
(13, '2', '8', 4, 'Cũng tạm được!'),
(15, '5', '1', 5, 'Sản phẩm này hay!   5 * nè');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favourite`
--

CREATE TABLE `favourite` (
  `ID` int(11) NOT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `favourite`
--

INSERT INTO `favourite` (`ID`, `ProductID`, `UserID`) VALUES
(21, 5, 1),
(22, 2, 1),
(23, 1, 1),
(24, 2, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nxb`
--

CREATE TABLE `nxb` (
  `ID` int(11) NOT NULL,
  `NXBName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nxb`
--

INSERT INTO `nxb` (`ID`, `NXBName`) VALUES
(1, 'NXB Thế Giới'),
(2, 'NXB Lao động'),
(3, 'NXB Dân Trí'),
(4, 'NXB Phụ Nữ'),
(5, 'NXB Hội Nhà Văn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `ProductName` varchar(500) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Image` varchar(500) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `AuthorID` int(11) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `NXBID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`ID`, `ProductName`, `Price`, `Quantity`, `Image`, `Description`, `AuthorID`, `CategoryID`, `NXBID`) VALUES
(1, 'Nhật Tụng Thiền Môn (Tái bản năm 2024)', 216000, 123, 'https://nhasachphuongnam.com/images/thumbnails/435/537/detailed/273/nhat-tung-thien-mon-tb-2024.jpg', 'Đã từ năm mươi năm nay, Phật tử Việt Nam, nhất là giới xuất gia, chờ đợi một cuốn<strong> Nhật Tụng Thiền Môn</strong> bằng Quốc Ngữ. Trong quá trình thực tập và hoằng pháp, tôi cũng đã từng nhiều lần cảm thấy nhu yếu cấp thiết này. Nay sách <strong> Nhật Tụng Thiền Môn</strong> của Đạo Tràng Mai Thôn được ấn hành, tôi hết sức vui mừng và xin trân trọng giới thiệu với các giới hành giả khắp nơi trong toàn quốc.<br>\r\n\r\nSách <strong> Nhật Tụng Thiền Môn</strong> mà quý vị đang nâng trên tay quả là một pháp bảo, quý giá vô cùng. Các vị giáo thọ của Đạo Tràng Mai Thôn đã để ra mười lăm năm để soạn tập, phiên dịch và xây dựng lên nó. Văn dịch sáng sủa và đẹp đẽ, diễn đạt được ý kinh một cách rõ ràng và tự nhiên, rất dễ tụng đọc. Các kinh điển được chọn lọc trong kinh tạng lại là những kinh tiêu biểu và căn bản, kinh nào cũng thiết yếu cho công phu hành trì của người xuất gia. Những bài kệ tán và xướng tụng hay nhất trong sách <strong> Nhật Tụng Thiền Môn</strong> cũ đều đã được phiên dịch rất khéo léo, thêm vào đó còn có rất nhiều bài kệ tán, phát nguyện và sám nguyện mới rất thích hợp với căn cơ và thời đại.<br>\r\n\r\nSách <strong> Nhật Tụng Thiền Môn</strong> này nếu được đem ra áp dụng sớm sẽ tạo ra rất nhiều sinh khí mới cho thiền môn và mở ra một kỷ nguyên mới cho sự thực tập.', 1, 3, 1),
(2, '[Tiểu thuyết] Dược Sư Tự Sự - Tập 4', 125000, 99, 'https://nhasachphuongnam.com/images/thumbnails/435/537/detailed/274/duoc-su-tu-su-tap-4-light-novel.jpg', 'Miêu Miêu biết chuyện bạn mình là Tiểu Lan đang tìm nơi chốn để làm việc sau khi rời hậu cung. Miêu Miêu và Tử Thuý tìm đến nhà tắm lớn trong hậu cung hòng tạo quan hệ giúp Tiểu Lan. Đúng lúc đó, Miêu Miêu nghe được chuyện Lí Thụ phi yếu đuối nhìn thấy ma, bèn bắt tay vào hành động nhằm giải quyết vụ việc.<br>\r\n\r\nMặt khác, tại cung Phỉ Thuý, em bé trong bụng Ngọc Diệp phi được xác định là ngôi thai ngược. Nhận định rằng ở chốn hậu cung không có nổi một Thái y đủ trình độ, nếu sinh thai nhi bị lộn ngược có thể sẽ phải đánh đổi bằng tính mạng, Miêu Miêu đề nghị cho cha nuôi La Môn của mình vào hậu cung, nhưng vấn đề mới lại nảy sinh. Miêu Miêu nhận thấy những vụ án xảy ra tại hậu cung tính tới giờ này đều có quy luật, và khi định tìm hiểu về chúng... cô lại bị bắt cóc.<br>\r\n\r\nThứ cặn bã đục ngầu đen ngòm lẩn quất ròng rã nhiều năm ở hoàng cung nay tụ lại, gây ra sự kiện làm náo động cả quốc gia.<br>\r\n\r\n<strong>DƯỢC SƯ TỰ SỰ</strong> là series light-novel thể loại trinh thám vô cùng độc đáo lấy bối cảnh cung đình. Truyện đã được chuyển thể manga và anime ra mắt vào cuối năm 2023. Tính đến tháng 1/2024, toàn series đã vượt mốc 31 triệu bản tại thị trường Nhật Bản và luôn thống trị bảng xếp hạng bán chạy mỗi khi ra tập mới!', 4, 1, 1),
(3, 'Dạy Con Phát Triển Toàn Não Bộ (Tái bản năm 2024)', 148500, 994, 'https://nhasachphuongnam.com/images/thumbnails/435/537/detailed/273/day-con-phat-trien-toan-nao-bo-tb-2024.jpg', 'Trong quá trình làm cha mẹ, hẳn các bậc phụ huynh đã đối mặt không ít với những lần con khóc lóc, ăn vạ và những đòi hỏi vô lý của con; nhưng chẳng mấy ai hiểu được nguyên nhân khiến con hành động như vậy. Cuốn sách Dạy con phát triển toàn não bộ sẽ giúp cha mẹ nhìn nhận rõ ràng mọi việc dưới góc độ tâm lý và thần kinh học; một khi tự lý giải được những hành vi vô lý của con, cha mẹ có thể bình tĩnh hơn để giúp con hiểu và điều chỉnh lại hành vi, cảm xúc. Bên cạnh đó, sách cũng giúp cha mẹ hiểu rõ bản thân hơn, để tự điều chỉnh hành vi, cảm xúc của mình trước, và rồi, con cái sẽ là đối tượng được hưởng lợi sau cùng.<br><br>\r\n\r\n<em>“Một nỗ lực tuyệt vời để khoa học về não bộ trở nên dễ hiểu với phụ huynh”</em>. - <strong>Publishers Weekly</strong> <br><br>\r\n\r\n“Tôi đã ước gì mình đọc cuốn sách này khi vừa mới bắt đầu làm mẹ. Nếu đọc sớm, hẳn tôi đã là một bà mẹ bớt đoảng và cáu kỉnh”. - Nguyên-Kan, tác giả sách Mẹ đoảng dạy con', 8, 4, 3),
(4, 'Công Chúa Áo Đen Và Sinh Nhật Đáng Nhớ - Tập 2', 89100, 110, 'https://nhasachphuongnam.com/images/thumbnails/435/537/detailed/273/cong-chua-ao-den-2-sinh-nhat-dang-nho.jpg', 'Từ Shannon & Dean Hale (nhóm viết đoạt giải thưởng Newbery Honor) và họa sĩ minh họa gốc Việt LeUyen Pham. Công chúa áo đen (bộ 5 tập) là loạt sách hành động và hài hước dành cho những độc giả nhỏ yêu thích các nàng công chúa không chỉ dịu dàng xinh đẹp, mà còn mặc đồ đen.<br><br>\r\n\r\n------\r\n<br><br>\r\nAi cũng biết, Mộc Lan là một nàng công chúa đoan trang hoàn hảo, yêu màu hồng và rất sợ ốc sên, hệt như bao nàng công chúa khác.<br><br>\r\n\r\nBỗng, Ring! Ring! Báo động quái vật! Phải làm sao bây giờ???<br>\r\n\r\nĐừng lo lắng, bởi vì công chúa Mộc Lan có một bí mật, nàng âm thầm làm Công Chúa Áo Đen và chiến đấu với quái vật là công việc hoàn hảo dành cho Công Chúa Áo Đen.<br><br>\r\n\r\nĐừng bỏ lỡ những cuộc phiêu lưu thú vị của<strong> Công Chúa Áo Đen </strong> trong:\r\n<ul>\r\n<li>CÔNG CHÚA ÁO ĐEN & Bí mật của công chúa Mộc Lan</li>\r\n<li>CÔNG CHÚA ÁO ĐEN & Sinh nhật đáng nhớ</li>\r\n<li>CÔNG CHÚA ÁO ĐEN & Bầy thỏ háu đói</li>\r\n<li>CÔNG CHÚA ÁO ĐEN & Kỳ nghỉ hoàn hảo</li>\r\n<li>CÔNG CHÚA ÁO ĐEN & Ngày hội công chúa anh hùng</li>\r\n</ul>\r\n\r\n\r\n\r\n\r\n\r\nCùng theo dõi nhé!', 7, 1, 1),
(5, 'Tội Ác Và Hình Phạt (Tái bản năm 2022)', 314100, 19, 'https://nhasachphuongnam.com/images/thumbnails/435/537/detailed/226/toi-ac-va-hinh-phat-tb-2022.jpg', '<strong>Tội Ác Và Hình Phạt</strong> là cuốn tiểu thuyết hoàn chỉnh và hay nhất trong các tác phẩm của cây bút bậc thầy nước Nga Fyodor Dostoevsky (1821 -1881). Chuyện kể về chàng sinh viên nghèo Raxkônnikốp vì quá lạc lối mà đã giết chết hai chị em bà lão cầm đồ. Những ngày sau đó, Raxkônnikốp rơi vào một bi kịch mới, khủng hoảng tinh thần trầm trọng. Anh càng cố gắng che giấu tội lỗi thì càng tỏ ra lúng túng.Tình yêu sâu sắc, sự hy sinh cao cả và tấm lòng nhân hậu của cô gái Xônya cùng sự quan tâm, yêu thương giúp đỡ của mọi người đã thức tỉnh Raxkônnikốp. Chấm dứt những giằng xé nội tâm, anh đưa ra quyết định: thà bị giam cầm về thể xác còn hơn bị tù đày về tâm hồn.<br><br>\r\n\r\nCuốn tiểu thuyết là một trong những tác phẩm có nội dung bi thảm nhất của nền văn học nhân loại. Với tấm lòng nhân đạo vô bờ bến, tác giả đã dựng lên một bức tranh ảm đạm về số phận bế tắc của tầng lớp người dưới đáy xã hội Nga. Tác phẩm còn là lời tố cáo mãnh liệt tầng lớp tư sản hãnh tiến, giẫm đạp lên đạo đức, nhân phẩm, tài năng.', 11, 2, 4),
(6, 'Chân Dung - Tuyển Tập Truyện Ngắn Song Ngữ Viêt-Anh Nguyễn Quang Thân', 129600, 335, 'https://nhasachphuongnam.com/images/thumbnails/435/537/detailed/274/chan-dung.jpg', '<h6>TRÀO LỘNG - TRỮ TÌNH - LẮNG SÂU</h6>\r\n\r\nNhà văn Mỹ Steven Millhauser trong bài báo “Tham vọng của truyện ngắn” (The Ambition of the Short Story) đã ví truyện ngắn như hạt cát mà tham vọng của hạt cát ấy là chứa đựng một phần của thế giới, hơn thế, nó muốn tạo ra hình hài cho cả thế giới này!<br><br>\r\n\r\nTừ truyện đầu tiên in năm 1957 đến nay, ngoài thế mạnh chính là tiểu thuyết và truyện dài, Nguyễn Quang Thân đã có hàng trăm truyện ngắn, phần nhiều trong số đó chưa bị bụi thời gian che mờ mà năm truyện trong tuyển tập này là một minh chứng. Năm hạt cát tiềm ẩn long lanh!<br><br>\r\n\r\nNăm truyện, năm cảnh huống và lát cắt nhưng hiện thực dữ dội đã được phơi bày bởi ngòi bút tài hoa, nhân ái và uy-mua hiếm quý. Dù với giọng điệu nào, trữ tình, cay đắng hay giễu nhại, nhà văn đều đi đến tận cùng của tâm trạng mà không sống trong chăn, không trải nghiệm bi kịch xã hội đương thời, người ta không viết nổi những trang văn này.<br><br>\r\n\r\nCảm ơn Nguyễn Quang Thân, Rosemary Nguyễn, Mạnh Chương. Rằng, dòng văn chương Việt đích thực vẫn đang chảy, nhất là những dòng chảy ngầm!<br><br>\r\n\r\n<strong>– Mai Quỳnh –</strong><br><br>\r\n\r\n“Cả người ông run lên. Có phải chính mắt ông vừa nhìn, tay ông vừa vẽ đấy không, hay là một ai khác? Vẫn đôi mắt như cũ, cái nhìn sắc lạnh của mắt trái, mắt phải vẫn vỡ ra, và vệt xám ông cố tình xóa đi, che lấp đi trên gò má thối rữa của người chết đuối bây giờ lại hiện ra, tuy có mờ ảo hơn, nhờ vậy nó đạt đến mức tinh tế mà bất kỳ họa sĩ bậc thầy nào cũng mong muốn. Con quỷ nhảy múa trên bức chân dung bây giờ lại có vẻ ngạo mạn hơn vì ông đã chạy chữa, đã làm hết sức mà không xua nổi nó.<br><br>\r\n\r\nTrong giây lát ông hiểu rằng bức chân dung đã quá thành công, ông không phạm sai lầm gì về nghệ thuật bố cục và ánh sáng. Ông đã vẽ đúng cái cần vẽ: sự thật về một con người.”<br><br>\r\n\r\n(Trích Chân Dung)<br>\r\n\r\nThông tin tác giả<br><br>\r\n\r\n<strong>NGUYỄN QUANG THÂN</strong> (1936 – 2017)<br><br>\r\n\r\nNgoài năm tiểu thuyết, sáu truyện dài cho thiếu nhi và hai kịch bản phim nhựa, Nguyễn Quang Thân còn là tác giả của nhiều truyện ngắn và vừa xuất sắc. Có thể kể đến:\r\n<ul>\r\n<li> Nước về (1957)</li>\r\n<li> Cô gái Triều Dương (1967)</li>\r\n<li>Chân dung (1985)</li>\r\n<li>Người không đi cùng chuyến tàu (1989)</li>\r\n<li>Vũ điệu của cái bô (1991)</li>\r\n<li>Thanh minh (1991)</li>\r\n<li>Hoa cho một đời (1996)</li>\r\n<li>Giao thừa trắng (1996)</li>\r\n<li>Gió heo may (1997)</li>\r\n<li>Người đàn bà đợi ở bến xe</li>\r\n</ul>\r\n', 7, 4, 5),
(7, 'Tội Phạm IQ Thấp (Tái bản năm 2023)', 199000, 632, 'https://nhasachphuongnam.com/images/thumbnails/435/537/detailed/274/toi-pham-iq-thap-tb-2023.jpg', 'Trong góc của thành phố, hai tên trộm ngu ngốc đang định gây ra một vụ án lớn nổi danh giang hồ...<br><br>\r\n\r\nVì danh lợi, một nhóm nhân vật tai to mặt lớn với đầy mưu sâu kế hiểm đã triển khai trận giao đấu ngầm khốc liệt.<br><br>\r\n\r\nTrong Sở công an thành phố Tam Giang Khẩu, một người cảnh sát rất hay gặp may đang phải đối diện với hiểm nguy, đem quân đi bắt đầu tiến hành cuộc điều tra bí mật…<br><br>\r\n\r\n------<br><br>\r\n\r\nTác phẩm “<strong>Tội phạm IQ thấp</strong>”, truyện mang văn phong hài hước mới lạ, thổi một luồng gió mới vào thể loại truyện trinh thám vốn có phần khô khan.<br>\r\n\r\nMột loạt các vụ án liên hoàn tiếp nối nhau dồn dập, cuộc so tài đọ sức gay cấn giữa “bọn trộm ngốc” và “thần thám”.<br>\r\n\r\nSau các cuốn sách xoắn não “Tội phạm trí tuệ cao” lại đến cuốn “Tội phạm IQ thấp” khiến độc giả cứ phải ôm bụng cười…<br><br>\r\n\r\nThông tin tác giả<br><br>\r\n\r\n<strong>Tử Kim Trần</strong><br><br>\r\n\r\nNhà văn Trung Quốc viết tiểu thuyết trinh thám nổi tiếng. Năm 2012, anh được vinh danh đạt hai giải thưởng “10 tác giả xuất sắc nhất trong năm” và “10 tác phẩm xuất sắc nhất” của văn học Thiên Nhai.<br><br>\r\n\r\nAnh được các bạn độc giả Trung Quốc yêu mến phong tặng danh hiệu “Keigo của Trung Quốc”.<br><br>\r\n\r\nVăn phong của anh súc tích, ngắn gọn, lạnh lùng và cẩn mật, đặc biệt chú ý đến chi tiết suy luận, dàn dựng nên cốt truyện có tầm vóc, kết thúc luôn khiến độc giả bất ngờ.<br><br>\r\n\r\nCác tác phẩm đã xuất bản tại Việt Nam:<br><br>\r\n\r\n“Mưu sát”, “Sự trả thù hoàn hảo”, “Sứ giả của thần chết”. \"Đứa trẻ hư\", \"Tội lỗi không chứng cứ\", \"Đêm trường tăm tối\", “Người truy tìm dấu vết”.<br>\r\n\r\nĐặc biệt, đã có tới ba tác phẩm của anh được chuyển thành phim truyền hình Trung Quốc đều được đánh giá rất cao:<br>\r\n\r\n“Tội lỗi không chứng cứ” dưới tên Tội lỗi không chứng cứ<br>\r\n\r\n“Đứa trẻ hư” dưới tên “Góc khuất bí mật”<br>\r\n\r\n“Đêm trường tăm tối” dưới tên “Chân tướng thầm lặng”<br>\r\n\r\nTác phẩm “Tội phạm IQ thấp”, truyện mang văn phong hài hước mới lạ, thổi một luồng gió mới vào thể loại truyện trinh thám vốn có phần khô khan.<br>\r\n\r\nMột loạt các vụ án liên hoàn tiếp nối nhau dồn dập, cuộc so tài đọ sức gay cấn giữa “bọn trộm ngốc” và “thần thám”.<br>\r\n\r\nSau các cuốn sách xoắn não “Tội phạm trí tuệ cao” lại đến cuốn “Tội phạm IQ thấp” khiến độc giả cứ phải ôm bụng cười…', 9, 3, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `receipt`
--

CREATE TABLE `receipt` (
  `ID` int(11) NOT NULL,
  `UserID` char(10) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `TotalMoney` decimal(15,2) DEFAULT NULL,
  `DateRecepit` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `ID` int(11) NOT NULL,
  `UserID` char(10) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `TotalMoney` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `userlogin`
--

CREATE TABLE `userlogin` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Pass` char(50) DEFAULT NULL,
  `Phone` char(15) DEFAULT NULL,
  `Address` varchar(500) DEFAULT NULL,
  `Role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `userlogin`
--

INSERT INTO `userlogin` (`ID`, `Name`, `Email`, `Pass`, `Phone`, `Address`, `Role`) VALUES
(1, 'Hồ Thanh Hải', 'haihailua123456@gmail.com', '1', '0384631254', '72/34 Dương Đức Hiền, Tây Thạnh, Tân Phú, TPHCM', 'user'),
(2, 'Minh Đức', 'Duc@gmail.com', '1', '0344228332', 'Duong Đức Hiền', 'user'),
(3, 'Hoàng Tâm', 'Tam@gmail.com', '1', '0646497964', 'Khách sạn Tân Sơn Nhất', 'user'),
(8, 'Hữu Đại', 'Dai@gmail.com', '1', '03368451', '49 Bùi ĐIền Thị Trấn Bình Dương , Phù Mỹ, Bình Định', 'user'),
(10, 'Hari', 'thanhhaihuit2k3@gmail.com', '1', '01122334455', '123 Tân Khải Hoàn', 'user');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `evaluate`
--
ALTER TABLE `evaluate`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `UserID` (`UserID`);

--
-- Chỉ mục cho bảng `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `FK_User_Fw` (`UserID`);

--
-- Chỉ mục cho bảng `nxb`
--
ALTER TABLE `nxb`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `AuthorID` (`AuthorID`),
  ADD KEY `CategoryID` (`CategoryID`),
  ADD KEY `NXBID` (`NXBID`);

--
-- Chỉ mục cho bảng `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Chỉ mục cho bảng `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Chỉ mục cho bảng `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `evaluate`
--
ALTER TABLE `evaluate`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `favourite`
--
ALTER TABLE `favourite`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `receipt`
--
ALTER TABLE `receipt`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `shoppingcart`
--
ALTER TABLE `shoppingcart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `favourite`
--
ALTER TABLE `favourite`
  ADD CONSTRAINT `FK_User_Fw` FOREIGN KEY (`UserID`) REFERENCES `userlogin` (`ID`),
  ADD CONSTRAINT `favor_product` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
