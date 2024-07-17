-- Tạo cơ sở dữ liệu db_dulich
CREATE DATABASE db_dulich;

-- Sử dụng cơ sở dữ liệu db_dulich
USE db_dulich;

-- tỉnh - thành phố
CREATE TABLE TINH_THANHPHO (
    MA_TINH CHAR(2) PRIMARY KEY NOT NULL,
    TEN_TINH VARCHAR(255) NOT NULL
);

-- quận huyện
CREATE TABLE QUAN_HUYEN (
    MA_QUAN CHAR(2) PRIMARY KEY NOT NULL,
    TEN_QUAN VARCHAR(255) NOT NULL,
    MA_TINH CHAR(2) NOT NULL,
    FOREIGN KEY (MA_TINH) REFERENCES TINH_THANHPHO(MA_TINH)
);

-- địa danh trong nước
CREATE TABLE DIADANH_TRONGNUOC (
    MA_DIADANH_TN CHAR(10) PRIMARY KEY NOT NULL,
    TEN_DIADANH_TN VARCHAR(255) NOT NULL,
    MO_TA TEXT,
    HINH_ANH CHAR(50),
    MA_QUAN CHAR(2),
    FOREIGN KEY (MA_QUAN) REFERENCES QUAN_HUYEN(MA_QUAN)
);

-- quốc gia
CREATE TABLE QUOCGIA (
    MA_QUOCGIA CHAR(3) PRIMARY KEY NOT NULL,
    TEN_QUOCGIA VARCHAR(255) NOT NULL
);

-- địa danh nước ngoài
CREATE TABLE DIADANH_NUOCNGOAI (
    MA_DIADANH_NN CHAR(10) PRIMARY KEY NOT NULL,
    TEN_DIADANH_NN VARCHAR(255) NOT NULL,
    MO_TA TEXT,
    HINH_ANH CHAR(50),
    MA_QUOCGIA CHAR(3),
    FOREIGN KEY (MA_QUOCGIA) REFERENCES QUOCGIA(MA_QUOCGIA)
);

-- loại Tour
CREATE TABLE LOAI_TOUR (
    MA_LOAITOUR CHAR(10) PRIMARY KEY NOT NULL,
    TEN_LOAI_TOUR NVARCHAR(255),
    MO_TA TEXT
);

-- Tour
CREATE TABLE TOUR (
    MA_TOUR CHAR(10) PRIMARY KEY NOT NULL,
    TEN_TOUR VARCHAR(255) NOT NULL,
    MA_LOAITOUR CHAR(10) NOT NULL,
    LOAI_IN_OUT VARCHAR(255) NOT NULL,
    MA_TINH_DI CHAR(2),
    MA_TINH_DEN CHAR(2),
    MA_QUOCGIA_DI CHAR(3),
    MA_QUOCGIA_DEN CHAR(3),
    GIA_TIEN INT NOT NULL,
    DONVI CHAR(6),
    SO_NGAY INT NOT NULL,
    SO_DEM INT,
    SO_CHO INT NOT NULL,
    NOI_DUNG TEXT,
    HINH_ANH CHAR(100),
    TRON_GOI INT NOT NULL,
    FOREIGN KEY (MA_TINH_DI) REFERENCES TINH_THANHPHO(MA_TINH),
    FOREIGN KEY (MA_TINH_DEN) REFERENCES TINH_THANHPHO(MA_TINH),
    FOREIGN KEY (MA_QUOCGIA_DI) REFERENCES QUOCGIA(MA_QUOCGIA),
    FOREIGN KEY (MA_QUOCGIA_DEN) REFERENCES QUOCGIA(MA_QUOCGIA),
    FOREIGN KEY (MA_LOAITOUR) REFERENCES LOAI_TOUR(MA_LOAITOUR)
);

-- chi tiết tour
CREATE TABLE CHITIET_TOUR (
    MA_TOUR CHAR(10),
    MA_DIADANH CHAR(10),
    NGAY_DI DATE,
    NGAY_VE DATE,
    PRIMARY KEY (MA_TOUR, MA_DIADANH),
    FOREIGN KEY (MA_TOUR) REFERENCES TOUR(MA_TOUR),
    FOREIGN KEY (MA_DIADANH) REFERENCES DIADANH_TRONGNUOC(MA_DIADANH_TN),
    FOREIGN KEY (MA_DIADANH) REFERENCES DIADANH_NUOCNGOAI(MA_DIADANH_NN)
);

-- hội viên
CREATE TABLE HOIVIEN (
    MA_LOAI_HV CHAR(10) PRIMARY KEY NOT NULL,
    LOAI_HOI_VIEN NVARCHAR(255),
    MO_TA TEXT
);

-- khách hàng
CREATE TABLE KHACHHANG (
    MA_KH CHAR(10) PRIMARY KEY NOT NULL,
    HO_TEN NVARCHAR(255) NOT NULL,
    NGAY_SINH DATE,
    GIOI_TINH VARCHAR(3) NOT NULL,
    SDT VARCHAR(10) NOT NULL,
    CCCD VARCHAR(12) NOT NULL,
    EMAIL VARCHAR(255),
    DIA_CHI VARCHAR(255),
    USERNAME CHAR(50) NOT NULL,
    PASSWORD VARCHAR(255) NOT NULL,
    MA_QUOCGIA CHAR(3),
    MA_LOAI_HV CHAR(10) NOT NULL,
    ANH_PROFILE CHAR(100),
    DIEM_TICH_LUY INT,
    NGAY_DANG_KY DATE,
    GHI_CHU TEXT,
    FOREIGN KEY (MA_QUOCGIA) REFERENCES QUOCGIA(MA_QUOCGIA),
    FOREIGN KEY (MA_LOAI_HV) REFERENCES HOIVIEN(MA_LOAI_HV)
);

-- chức vụ
CREATE TABLE CHUCVU (
    MA_CHUCVU CHAR(10) PRIMARY KEY NOT NULL,
    TEN_CHUCVU NVARCHAR(255)
);

-- nhân viên
CREATE TABLE NHANVIEN (
    MA_NV CHAR(10) PRIMARY KEY NOT NULL,
    HO_TEN_NV NVARCHAR(255),
    NGAY_SINH DATE,
    GIOITINH VARCHAR(3),
    SDT VARCHAR(10),
    EMAIL VARCHAR(255),
    MA_CHUCVU CHAR(10),
    DIACHI VARCHAR(255),
    USERNAME CHAR(50) NOT NULL,
    PASSWORD VARCHAR(255) NOT NULL,
    ANH_PROFILE CHAR(100),
    NGAY_DANG_KY DATE,
    GHI_CHU TEXT,
    FOREIGN KEY (MA_CHUCVU) REFERENCES CHUCVU(MA_CHUCVU)
);

-- đặt tour
CREATE TABLE DATTOUR (
    MA_DATTOUR CHAR(10) PRIMARY KEY NOT NULL,
    MA_TOUR CHAR(10) NOT NULL,
    MA_KH CHAR(10) NOT NULL,
    SO_CHO_CANDAT INT NOT NULL,
    TRANG_THAI INT,
    NGAY_DAT DATE,
    FOREIGN KEY (MA_TOUR) REFERENCES TOUR(MA_TOUR),
    FOREIGN KEY (MA_KH) REFERENCES KHACHHANG(MA_KH)
);

-- nhật ký đặt tour
CREATE TABLE NHATKY_DATTOUR (
    MA_NKDT CHAR(10) PRIMARY KEY NOT NULL,
    MA_DATTOUR CHAR(10),
    TIEN_COC DECIMAL(18),
    MA_NV CHAR(10),
    FOREIGN KEY (MA_DATTOUR) REFERENCES DATTOUR(MA_DATTOUR),
    FOREIGN KEY (MA_NV) REFERENCES NHANVIEN(MA_NV)
);

-- chi tiết đặt tour
CREATE TABLE CHITIET_DATTOUR (
    MA_CHITIET_DATTOUR CHAR(10) PRIMARY KEY NOT NULL,
    MA_DATTOUR CHAR(10),
    HO_TEN NVARCHAR(255),
    NGAY_SINH DATE,
    CCCD VARCHAR(12),
    GHI_CHU TEXT,
    FOREIGN KEY (MA_DATTOUR) REFERENCES DATTOUR(MA_DATTOUR)
);

-- lịch trình tour
CREATE TABLE LICH_TRINH_TOUR (
    MA_LICHTRINH CHAR(10) PRIMARY KEY NOT NULL,
    MA_TOUR CHAR(10),
    NGAY_DI DATE,
    NGAY_VE DATE,
    SO_CHO_DADAT INT,
    FOREIGN KEY (MA_TOUR) REFERENCES TOUR(MA_TOUR)
);

-- Thêm dữ liệu vào bảng TINH_THANHPHO
INSERT IGNORE INTO TINH_THANHPHO (MA_TINH, TEN_TINH) VALUES
    ('01', 'Hà Nội'),
    ('06', 'Cao Bằng'),
    ('79', 'Hồ Chí Minh'),
    ('02', 'Hà Giang'),
    ('10', 'Lào Cai'),
    ('22', 'Quảng Ninh'),
    ('27', 'Ninh Bình'),
    ('44', 'Quảng Bình'),
    ('46', 'Thừa Thiên-Huế'),
    ('49', 'Quảng Nam'),
    ('48', 'Đà Nẵng'),
    ('56', 'Khánh Hòa'),
    ('68', 'Lâm Đồng'),
    ('60', 'Bình Thuận'),
    ('91', 'Kiên Giang'),
    ('96', 'Cà Mau'),
    ('SN', 'Sydney'),
    ('DB', 'Dubai'),
    ('SE', 'Seoul'),
    ('RS', 'Ramiswil'),
    ('MD', 'Madrid'),
    ('SG', 'Singapore'),
    ('SZ', 'Shizuoka'),
    ('PR', 'Paris'),
    ('BL', 'Bali');

-- Thêm dữ liệu vào bảng QUAN_HUYEN
INSERT IGNORE INTO QUAN_HUYEN (MA_QUAN, TEN_QUAN, MA_TINH) VALUES
    ('001', 'Quận Ba Đình', '01'),
    ('006', 'Quận Đống Đa', '01'),
    ('026', 'Huyện Đồng Văn', '02'),
    ('088', 'Thị xã Sa Pa', '10'),
    ('193', 'Thành phố Hạ Long', '22'),
    ('455', 'Huyện Bố Trạch', '44'),
    ('474', 'Thành phố Huế', '46'),
    ('497', 'Huyện Hòa Vang', '48'),
    ('503', 'Thành phố Hội An', '49'),
    ('568', 'Thành phố Nha Trang', '56'),
    ('593', 'Thành phố Phan Thiết', '60'),
    ('672', 'Thành phố Đà Lạt', '68'),
    ('760', 'Quận 1', '79'),
    ('783', 'Huyện Củ Chi', '79'),
    ('911', 'Thành phố Phú Quốc', '91'),
    ('964', 'Thành phố Cà Mau', '96');

INSERT INTO DIADANH_TRONGNUOC (MA_DIADANH_TN, TEN_DIADANH_TN, MO_TA, HINH_ANH, MA_QUAN) VALUES
    ('HN1', 'Lăng Chủ tịch Hồ Chí Minh', 'Lăng Chủ tịch Hồ Chí Minh là một địa danh lịch sử nổi tiếng tại Việt Nam. Nơi đây là nơi an nghỉ cuối cùng của Chủ tịch Hồ Chí Minh - người đồng chí lãnh đạo nước Việt Nam từng có công lớn trong cuộc cách mạng. Lăng Chủ tịch là một di tích quan trọng và được người dân Việt Nam tôn kính và tưởng nhớ.', 'img1.jpg', '001'),
    ('HN2', 'Văn Miếu - Quốc Tử Giám', 'Văn Miếu - Quốc Tử Giám là đền văn học lớn nhất Hà Nội. Đây là một địa điểm quan trọng và cổ kính trong văn hóa Việt Nam. Nơi đây được xây dựng từ thời Lê Thánh Tông vào năm 1070 và được sử dụng để tôn vinh các danh nhân và học giả xuất sắc của đất nước. Văn Miếu - Quốc Tử Giám có kiến trúc độc đáo và là một điểm đến thu hút du khách trong và ngoài nước.', 'img2.jpg', '006'),
    ('HN3', 'Hoàng thành Thăng Long', 'Hoàng thành Thăng Long là một di tích lịch sử chính trị quan trọng tại Hà Nội. Đây là nơi từng là kinh đô của đất nước Việt Nam trong nhiều thế kỷ. Hoàng thành Thăng Long mang trong mình những di sản văn hóa, kiến trúc độc đáo và đồng thời là biểu tượng của quyền lực chính trị của triều đại phong kiến. Nơi đây thu hút du khách bởi sự hùng vĩ và lịch sử sắp đặt của nó.', 'img3.jpg', '001'),
    ('HG1', 'Cột cờ Lũng Cú', 'Cột cờ Lũng Cú là biểu tượng địa lý quốc gia của Việt Nam. Đây là điểm đánh dấu cực bắc của đất nước, nằm ở huyện Đồng Văn, tỉnh Hà Giang. Nơi đây thu hút du khách bởi vẻ đẹp hoang sơ, hùng vĩ của núi non và sự độc đáo của vị trí địa lý. Cột cờ Lũng Cú là một điểm dừng chân thú vị cho những ai muốn khám phá vùng đất phía Bắc Việt Nam.', 'img4.jpg', '026'),
    ('HG2', 'Cao nguyên đá Đồng Văn', 'Cao nguyên đá Đồng Văn là khu du lịch thiên nhiên độc đáo nằm ở huyện Đồng Văn, tỉnh Hà Giang. Đây là một điểm đến hấp dẫn cho những người yêu thích khám phá thiên nhiên hoang sơ. Cao nguyên đá Đồng Văn có cảnh quan đẹp mê hồn với những thung lũng, những mảng đá khổng lồ và vẻ đẹp hoang sơ của núi non. Du khách có thể khám phá và trải nghiệm cuộc sống bản địa tại đây.', 'img5.jpg', '026'),
    ('LC1', 'Sapa', 'Sapa là một thành phố du lịch nổi tiếng tại Việt Nam, nằm ở tỉnh Lào Cai. Nơi đây được biết đến với khung cảnh thiên nhiên tuyệt đẹp, những cánh đồng bậc thang xanh mướt và những ngôi làng của các dân tộc thiểu số. Sapa cũng là điểm xuất phát để khám phá dãy núi Fansipan - đỉnh núi cao nhất của Đông Nam Á. Du khách có thể tham gia các hoạt động trekking, thăm thú các bản làng dân tộc và tận hưởng không gian yên bình của vùng núi cao.', 'img6.jpg', '088'),
    ('QNI1', 'Vịnh Hạ Long', 'Vịnh Hạ Long là một di sản thiên nhiên thế giới nằm ở tỉnh Quảng Ninh. Với hàng ngàn hòn đảo và vách đá kỳ thú, Vịnh Hạ Long tạo nên một cảnh quan đẹp mê hồn. Du khách có thể tham gia các tour du thuyền để khám phá những hang động độc đáo, tắm biển, tham gia các hoạt động thể thao dưới nước và tận hưởng khung cảnh tuyệt vời của vịnh.', 'img7.jpg', '193'),
    ('QB1', 'Phong Nha - Kẻ Bàng', 'Phong Nha - Kẻ Bàng là khu du lịch động nằm ở tỉnh Quảng Bình. Với hệ thống hang động phong phú và đa dạng, Phong Nha - Kẻ Bàng là một điểm đến hấp dẫn cho những người yêu thích khám phá hang động. Đỉnh cao của khu du lịch là hang Sơn Đoòng - hang động lớn nhất thế giới. Du khách có thể khám phá các hang động, tham gia trekking và trải nghiệm cuộc sống trong hang.', 'img8.jpg', '455'),
    ('TTH1', 'Cố đô Huế', 'Cố đô Huế là một di sản văn hóa thế giới nằm ở tỉnh Thừa Thiên Huế. Đây là nơi từng là kinh đô của triều Nguyễn trong thời gian dài. Cố đô Huế mang trong mình những kiến trúc độc đáo và lịch sử phong phú. Du khách có thể tham quan các cung điện, đền đài, và các công trình kiến trúc đẹp mắt khác trong khu di tích Cố đô Huế.', 'img9.jpg', '474'),
    ('ĐN1', 'Bà Nà Hills', 'Bà Nà Hills là khu du lịch vui chơi giải trí nằm ở thành phố Đà Nẵng. Nơi đây có khí hậu mát mẻ quanh năm và được biết đến với khung cảnh đẹp như tiên cảnh. Bà Nà Hills có nhiều công trình kiến trúc ấn tượng như cáp treo, cầu vàng, công viên giải trí, khu du lịch sinh thái và các khu nghỉ dưỡng. Du khách có thể tận hưởng không gian xanh mát, tham gia các hoạt động giải trí và thưởng thức ẩm thực đa dạng tại đây.', 'img10.jpg', '497'),
    ('QNA1', 'Phố cổ Hội An', 'Phố cổ Hội An là một di sản văn hóa thế giới nằm ở tỉnh Quảng Nam. Đây là một thành phố cổ có kiến trúc độc đáo, pha trộn giữa các yếu tố văn hóa Việt Nam, Trung Quốc và Nhật Bản. Phố cổ Hội An nổi tiếng với các ngôi nhà cổ, những con đường nhỏ, cầu cổ và các cửa hàng thủ công truyền thống. Du khách có thể tham quan phố cổ, mua sắm, thưởng thức ẩm thực và trải nghiệm không gian lãng mạn của thành phố.', 'img11.jpg', '503'),
    ('KH1', 'Nha Trang', 'Nha Trang là một thành phố biển nổi tiếng tại Việt Nam, nằm ở tỉnh Khánh Hòa. Thành phố này có bãi biển đẹp với cát trắng và nước biển trong xanh. Nha Trang cũng là điểm đến phổ biến cho các hoạt động thể thao dưới nước như lặn biển, lướt ván và du thuyền. Ngoài ra, du khách có thể tham quan các đảo xung quanh, thưởng thức hải sản tươi ngon và tận hưởng không khí nghỉ dưỡng của thành phố.', 'img12.jpg', '568'),
    ('BT1', 'Phan Thiết - Mũi Né', 'Phan Thiết - Mũi Né là thành phố biển nằm ở tỉnh Bình Thuận. Thành phố này có bãi biển đẹp với cát trắng và nắng ấm quanh năm. Mũi Né cũng nổi tiếng với các điểm lướt sóng thuận lợi và là một địa điểm phổ biến cho các hoạt động thể thao dưới nước như lướt ván và lướt ván buồm. Du khách có thể thưởng thức cảnh quan biển tuyệt đẹp, tham gia các hoạt động thể thao và thưởng thức hải sản tươi ngon.', 'img13.jpg', '593'),
    ('LĐ1', 'Đà Lạt', 'Đà Lạt là một thành phố nằm ở tỉnh Lâm Đồng. Thành phố này được biết đến với danh xưng "thành phố ngàn hoa" và khí hậu mát mẻ quanh năm. Đà Lạt có cảnh quan thiên nhiên đẹp, với các hồ, suối, đồi thông và vườn hoa. Nơi đây cũng có các resort, khách sạn và điểm tham quan phổ biến như Hồ Xuân Hương, Vườn hoa Đà Lạt và Thiền viện Trúc Lâm. Du khách có thể tham gia các hoạt động trekking, tham quan vườn hoa và thưởng thức không gian yên bình của thành phố.', 'img14.jpg', '672'),
    ('HCM1', 'Dinh Độc Lập', 'Dinh Độc Lập là một di tích lịch sử quan trọng nằm ở thành phố Hồ Chí Minh. Đây là nơi tổ chức các hoạt động chính trị quan trọng và diễn ra nhiều sự kiện lịch sử quan trọng của Việt Nam. Dinh Độc Lập là một tòa nhà kiến trúc độc đáo và đẹp mắt, tượng trưng cho sự độc lập và tự do của dân tộc Việt Nam. Du khách có thể tham quan và tìm hiểu về lịch sử và văn hóa của đất nước tại đây.', 'img15.jpg', '760'),
    ('HCM2', 'Địa đạo Củ Chi', 'Địa đạo Củ Chi là một hệ thống địa đạo nổi tiếng nằm ở thành phố Hồ Chí Minh. Đây là nơi diễn ra nhiều hoạt động của người dân và quân đội Việt Nam trong thời kỳ chiến tranh. Hệ thống địa đạo này rất đa dạng và phức tạp, bao gồm các hầm, kênh ngầm, căn cứ và các phòng trưng bày. Du khách có thể tham quan và tìm hiểu về cuộc chiến tranh và cuộc sống trong địa đạo.', 'img16.jpg', '783'),
    ('KG1', 'Phú Quốc', 'Phú Quốc là một hòn đảo nhiệt đới nằm ở tỉnh Kiên Giang. Nơi đây có bãi biển tuyệt đẹp với cát trắng và nước biển trong xanh. Phú Quốc cũng nổi tiếng với đặc sản hải sản và các khu nghỉ dưỡng sang trọng. Du khách có thể tham gia các hoạt động thể thao dưới nước, thăm quan các đảo xung quanh và thưởng thức ẩm thực đa dạng của hòn đảo.', 'img17.jpg', '911'),
    ('CM1', 'Đất mũi Cà Mau', 'Đất mũi Cà Mau là đất đầu quốc gia và nằm ở miền Nam Việt Nam. Đây là một vùng đất độc đáo với các cánh đồng lúa, rừng ngập mặn và đầm phá. Đất mũi Cà Mau cũng có các điểm tham quan như Công viên rừng U Minh Hạ, Đảo Khô Con và Chợ Đầm Dương. Du khách có thể tham gia các tour du thuyền, khám phá các khu vực sinh thái đa dạng và thưởng thức ẩm thực đặc sản của vùng đất này.', 'img18.jpg', '964');

-- Thêm dữ liệu vào bảng QUOCGIA
INSERT INTO QUOCGIA (MA_QUOCGIA, TEN_QUOCGIA) VALUES
    ('CNH', 'China'),
    ('FRA', 'France'),
    ('IDN', 'Indonesia'),
    ('ITA', 'Italy'),
    ('JPN', 'Japan'),
    ('KOR', 'Korea'),
    ('RUS', 'Russia'),
    ('SGN', 'Singapore'),
    ('THA', 'Thailand'),
    ('AUS', 'Australia'),
    ('UAE', 'United Arab Emirates'),
    ('SUI', 'Switzerland'),
    ('ESP', 'Spain'),
    ('VIE', 'Vietnam');

-- Thêm dữ liệu vào bảng DIADANH_NUOCNGOAI
INSERT INTO DIADANH_NUOCNGOAI (MA_DIADANH_NN, TEN_DIADANH_NN, MO_TA, HINH_ANH, MA_QUOCGIA) VALUES
    ('101', 'Phượng Hoàng Cổ Trấn', 'Di tích lịch sử nổi tiếng ở Trung Quốc', 'pic-1.jpg', 'CNH'),
    ('102', 'Eiffel Tower', 'Tháp sắt nổi tiếng ở Pháp', 'pic-2.jpg', 'FRA'),
    ('103', 'Thung lũng hoa Uttaranchal', 'Khu vườn hoa tuyệt đẹp ở Indonesia', 'pic-3.jpg', 'IDN'),
    ('104', 'Roma', 'Thủ đô cổ của Italy', 'pic-4.jpg', 'ITA'),
    ('105', 'Núi Phú Sĩ', 'Núi lửa cao nhất ở Nhật Bản', 'pic-5.jpg', 'JPN'),
    ('106', 'Đảo Jejudo', 'Hòn đảo du lịch nổi tiếng ở Hàn Quốc', 'pic-6.jpg', 'KOR'),
    ('107', 'Moskva - Cung điện Mùa Đông', 'Cung điện lịch sử ở Nga', 'pic-7.jpg', 'RUS'),
    ('108', 'Thành phố Singapore', 'Thành phố hiện đại và đa văn hóa', 'pic-8.jpg', 'SGN'),
    ('109', 'Thủ đô Bangkok', 'Thủ đô sầm uất của Thái Lan', 'pic-9.jpg', 'THA');

-- Thêm dữ liệu vào bảng LOAI_TOUR
INSERT INTO LOAI_TOUR (MA_LOAITOUR, TEN_LOAI_TOUR, MO_TA) VALUES
    ('L01', 'Tour tham quan thành phố', 'Đây là loại tour dành cho du khách muốn khám phá các điểm tham quan nổi tiếng, di tích lịch sử, kiến trúc độc đáo, văn hóa địa phương và các địa điểm quan trọng của một thành phố hay vùng đất nào đó.'),
    ('L02', 'Tour du lịch thiên nhiên', 'Loại tour này tập trung vào việc khám phá và tận hưởng thiên nhiên, bao gồm công viên quốc gia, đồng cỏ, rừng núi, biển cả, hồ, thác nước và cảnh quan tự nhiên tuyệt đẹp.'),
    ('L03', 'Tour du lịch văn hóa', 'Đây là tour dành cho những người muốn trải nghiệm văn hóa đặc trưng của một quốc gia hoặc khu vực. Du khách có thể tham gia vào các hoạt động như học làm nghề truyền thống, tham gia lễ hội, xem diễn văn hóa, thưởng thức ẩm thực địa phương và thăm các di tích lịch sử.'),
    ('L04', 'Tour du lịch mạo hiểm', 'Đối với những người yêu thích cảm giác mạnh, tour du lịch mạo hiểm cung cấp các hoạt động như leo núi, đi bộ đường dài, lặn biển, đi băng trượt, leo núi đá, thám hiểm hang động và các hoạt động phiêu lưu khác.'),
    ('L05', 'Tour du lịch giải trí', 'Loại tour này tập trung vào việc tận hưởng giải trí và vui chơi, bao gồm tham quan công viên giải trí, khu vui chơi, đi xem biểu diễn, tham gia trò chơi và thưởng thức ẩm thực đặc sản.'),
    ('L06', 'Tour du lịch nghỉ dưỡng', 'Đây là tour dành cho những người muốn thư giãn và tận hưởng những dịch vụ nghỉ dưỡng cao cấp như khu nghỉ dưỡng biển, resort, spa, sân golf và các hoạt động giải trí tại khu vực nghỉ dưỡng.');

-- Thêm dữ liệu vào bảng TOUR
INSERT INTO TOUR (MA_TOUR, TEN_TOUR, MA_LOAITOUR, LOAI_IN_OUT, MA_TINH_DI, MA_TINH_DEN, MA_QUOCGIA_DI, MA_QUOCGIA_DEN, GIA_TIEN, DONVI, SO_NGAY, SO_DEM, SO_CHO, NOI_DUNG, HINH_ANH, TRON_GOI) VALUES
    ('T01', 'Tour Hà Giang', 'L03', 'Inbound', '01', '02', 'VIE', 'VIE', 2490000, 'đ', 5, 4, 20, 'Tour du lịch Hà Giang mang đến trải nghiệm khám phá vẻ đẹp thiên nhiên hoang sơ, những cánh đồng hoa tam giác mạch nổi tiếng và văn hóa độc đáo của người dân địa phương.', 'img-1.jpg', 1),
    ('T02', 'Tour Singapore', 'L01', 'Outbound', '79', 'SG', 'VIE', 'SGN', 3999, 'USD', 4, 3, 20, 'Tour du lịch Singapore cung cấp cơ hội khám phá một thành phố hiện đại, đa văn hóa với những điểm tham quan nổi tiếng như Công viên Quốc gia Sentosa, Cầu cảng Gardens by the Bay và khu phố Trung tâm.', 'img-2.jpg', 1),
    ('T03', 'Tour Phú Quốc', 'L06', 'Inbound', '79', '91', 'VIE', 'VIE', 2390000, 'đ', 2, 1, 20, 'Tour du lịch Phú Quốc mang đến trải nghiệm nghỉ dưỡng tuyệt vời trên hòn đảo ngọc nổi tiếng với bãi biển tuyệt đẹp, cảnh quan thiên nhiên hùng vĩ và ẩm thực độc đáo.', 'img-3.jpg', 1),
    ('T04', 'Tour France', 'L01', 'Outbound', '79', 'PR', 'VIE', 'FRA', 1999, 'USD', 3, 2, 20, 'Tour du lịch Pháp mang đến trải nghiệm khám phá những công trình kiến trúc đẹp như Tháp Eiffel, Bảo tàng Louvre và quần thể cung điện Versailles.', 'img-4.jpg', 1),
    ('T05', 'Tour Phan Thiết', 'L05', 'Inbound', '68', '60', 'VIE', 'VIE', 4900000, 'đ', 2, 1, 20, 'Tour du lịch Phan Thiết mang đến trải nghiệm thư giãn trên bãi biển đẹp, khám phá đồng cỏ cát trắng Mũi Né và thưởng thức hải sản tươi ngon.', 'img-5.jpg', 1),
    ('T06', 'Tour Nhật Bản', 'L03', 'Outbound', '01', 'SZ', 'VIE', 'JPN', 5900000, 'đ', 5, 4, 20, 'Tour du lịch Nhật Bản mang đến trải nghiệm khám phá nền văn hóa truyền thống, công nghệ tiên tiến và các điểm tham quan nổi tiếng như Thành phố Tokyo, Đền Asakusa và Hội An.', 'img-6.jpg', 1),
    ('T07', 'Tour Nha Trang', 'L06', 'Inbound', '79', '56', 'VIE', 'VIE', 3890000, 'đ', 3, 2, 35, 'Tour du lịch Nha Trang mang đến trải nghiệm nghỉ dưỡng tuyệt vời trên bãi biển đẹp, tham quan các đảo như Đảo Hòn Tre và thưởng thức hải sản tươi ngon.', 'img-7.jpg', 1),
    ('T08', 'Tour Đà Lạt', 'L01', 'Inbound', '79', '68', 'VIE', 'VIE', 2790000, 'đ', 2, 1, 20, 'Tour du lịch Đà Lạt mang đến trải nghiệm thư giãn trong không gian mát mẻ, khám phá các vườn hoa đẹp và tham quan các điểm du lịch như Hồ Xuân Hương và Đồi Mộng Mơ.', 'img-8.jpg', 1),
    ('T09', 'Tour Sapa', 'L06', 'Inbound', '79', '10', 'VIE', 'VIE', 2390000, 'đ', 2, 1, 20, 'Tour du lịch Sapa mang đến trải nghiệm khám phá vùng núi hùng vĩ, thăm các bản làng dân tộc và thưởng thức ẩm thực độc đáo.', 'img-9.jpg', 1),
    ('T10', 'Tour Ninh Bình', 'L01', 'Inbound', '01', '27', 'VIE', 'VIE', 2999000, 'đ', 3, 2, 25, 'Tour du lịch Ninh Bình mang đến trải nghiệm khám phá vẻ đẹp thiên nhiên đặc trưng của vùng đất Tam Cốc, Tràng An và tham quan các danh lam thắng cảnh nổi tiếng.', 'img-10.jpg', 1),
    ('T11', 'Tour Huế', 'L05', 'Inbound', '79', '46', 'VIE', 'VIE', 4990000, 'đ', 3, 2, 30, 'Tour du lịch Huế mang đến trải nghiệm khám phá di sản văn hóa thế giới, tham quan Cố đô Huế và thưởng thức ẩm thực truyền thống.', 'img-11.jpg', 1),
    ('T12', 'Tour Cao Bằng', 'L04', 'Inbound', '01', '06', 'VIE', 'VIE', 5780000, 'đ', 5, 4, 15, 'Tour du lịch Cao Bằng mang đến trải nghiệm khám phá vẻ đẹp hoang sơ của địa phương, tham quan Động Phong Nha, Hang Sơn Đoòng và thưởng thức ẩm thực địa phương.', 'img-12.jpg', 1),
    ('T13', 'Tour Australia', 'L03', 'Outbound', '01', 'SN', 'VIE', 'AUS', 1888, 'USD', 3, 2, 20, 'Tour du lịch Úc mang đến trải nghiệm khám phá vẻ đẹp thiên nhiên đa dạng, tham quan Thành phố Sydney, Rạn san hô Great Barrier và thưởng thức ẩm thực đặc trưng.', 'img-13.jpg', 1),
    ('T14', 'Tour UAE', 'L04', 'Outbound', '79', 'DB', 'VIE', 'UAE', 4999, 'USD', 7, 6, 30, 'Tour du lịch UAE mang đến trải nghiệm khám phá sự xa hoa và hiện đại của các tiểu quốc Arab Emirates, tham quan Thành phố Dubai, sa mạc Sahara và trải nghiệm du thuyền trên Vịnh Ba Tư.', 'img-14.jpg', 1),
    ('T15', 'Tour Hàn Quốc', 'L06', 'Outbound', '79', 'SE', 'VIE', 'KOR', 2390, 'USD', 5, 4, 45, 'Tour du lịch Hàn Quốc mang đến trải nghiệm khám phá văn hóa truyền thống và hiện đại, tham quan Thành phố Seoul, Lâu đài Gyeongbokgung và khu phố Myeongdong.', 'img-15.jpg', 1),
    ('T16', 'Tour Thụy Sỹ', 'L01', 'Outbound', '01', 'RS', 'ITA', 'SUI', 2999, 'USD', 5, 4, 30, 'Tour du lịch Thụy Sỹ mang đến trải nghiệm khám phá cảnh quan tuyệt đẹp của núi Alps, tham quan thành phố Geneva, Hồ Geneva và chơi trượt tuyết ở Zermatt.', 'img-16.jpg', 1),
    ('T17', 'Tour Tây Ban Nha', 'L05', 'Outbound', '79', 'MD', 'VIE', 'ESP', 2699, 'USD', 4, 3, 25, 'Tour du lịch Tây Ban Nha mang đến trải nghiệm khám phá di sản văn hóa thế giới, tham quan thành phố Barcelona, Đền Sagrada Familia và chinh phục đỉnh núi Montserrat.', 'img-17.jpg', 1),
    ('T18', 'Tour Indonesia', 'L03', 'Outbound', '79', 'BL', 'KOR', 'IDN', 1789, 'USD', 4, 3, 30, 'Tour du lịch Indonesia mang đến trải nghiệm khám phá vẻ đẹp thiên nhiên đa dạng, tham quan Thành phố Jakarta, Đảo Bali và thưởng thức ẩm thực đặc trưng.', 'img-18.jpg', 1);

-- Thêm dữ liệu vào bảng HOIVIEN
INSERT INTO HOIVIEN (MA_LOAI_HV, LOAI_HOI_VIEN, MO_TA) VALUES
    ('HV01', 'Hội viên thông thường', 'Đây là hội viên phổ biến nhất và dành cho tất cả các khách hàng. Hội viên này có thể nhận được các ưu đãi và khuyến mãi đặc biệt khi đặt tour hoặc dịch vụ du lịch của công ty.'),
    ('HV02', 'Hội viên thường xuyên', 'Đối với khách hàng quan trọng và cao cấp, công ty có thể tạo ra một hội viên VIP với các đặc quyền độc đáo. Hội viên VIP có thể được cung cấp dịch vụ cá nhân hóa, hỗ trợ 24/7, truy cập vào các trải nghiệm du lịch độc đáo, và các tiện ích khác như đặc trưng trong kỳ nghỉ cao cấp.'),
    ('HV03', 'Hội viên VIP', 'Đối với khách hàng quan trọng và cao cấp, công ty có thể tạo ra một hội viên VIP với các đặc quyền độc đáo. Hội viên VIP có thể được cung cấp dịch vụ cá nhân hóa, hỗ trợ 24/7, truy cập vào các trải nghiệm du lịch độc đáo, và các tiện ích khác như đặc trưng trong kỳ nghỉ cao cấp.');

-- Thêm dữ liệu vào bảng KHACHHANG
INSERT INTO KHACHHANG (MA_KH, HO_TEN, NGAY_SINH, GIOI_TINH, SDT, CCCD, EMAIL, DIA_CHI, USERNAME, PASSWORD, MA_QUOCGIA, MA_LOAI_HV, ANH_PROFILE, DIEM_TICH_LUY, NGAY_DANG_KY, GHI_CHU) VALUES
    ('KH01', 'Trần Thành Phát', '2003-5-13', 'Nam', '0399920345', '123456789012', 'abc@example.com', 'Hồ Chí Minh', 'phat123', '$2y$10$oF5WEjrPbRt9YSgUlWQB2.H9MG4moJdoEoeWGH/GoScgZvusoF6X6', 'VIE', 'HV01', 'pic-1.jpg', 0 , '2023-5-14', NULL),
    ('KH02', 'Lê Thị Hồng Ngọc', '1995-11-7', 'Nữ', '0977382903', '987654321098', 'def@example.com', 'Hồ Chí Minh', 'user2', 'pass2', 'VIE', 'HV02', 'pic-2.jpg', 0 , '2023-5-13', NULL),
    ('KH03', 'Phạm Tuấn Nghĩa', '1999-12-21', 'Nam', '0399920345', '123456789012', 'ghi@example.com', 'Hà Nội', 'user3', 'pass3', 'VIE', 'HV01', 'pic-3.jpg', 0 , '2023-5-18', NULL),
    ('KH04', 'Jenny Harry', '1997-5-9', 'Nữ', '0977382903', '987654321098', 'iwq@example.com', 'Hồ Chí Minh', 'user4', 'pass4', 'FRA', 'HV02', 'pic-4.jpg', 0 , '2023-7-27', NULL),
    ('KH05', 'Park MinKyung', '1989-7-30', 'Nam', '0399920345', '123456789012', 'feg@example.com', 'Hà Nội', 'user5', 'pass5', 'KOR', 'HV01', 'pic-5.jpg', 0 , '2023-8-25', NULL),
    ('KH06', 'Cristiano ThankFast', '2003-5-13', 'Nam', '0977382903', '987654321098', 'tfast@cr7.com', 'Hồ Chí Minh', 'user6', 'pass6', 'RUS', 'HV02', 'pic-6.jpg', 0 , '2023-3-8', NULL);

-- Thêm dữ liệu vào bảng CHUCVU
INSERT INTO CHUCVU (MA_CHUCVU, TEN_CHUCVU) VALUES
    ('CV000', 'Giám đốc'),
    ('CV100', 'Quản lý'),
    ('CV101', 'Nhân viên kinh doanh'),
    ('CV102', 'Nhân viên tài chính'),
    ('CV103', 'Nhân viên marketing'),
    ('CV104', 'Nhân viên điều hành tour'),
    ('CV105', 'Kế toán'),
    ('CV106', 'Hướng dẫn viên du lịch'),
    ('CV107', 'Nhân viên kỹ thuật'),
    ('CV201', 'Lao công'),
    ('CV202', 'Bảo vệ');

-- Thêm dữ liệu vào bảng NHANVIEN
INSERT INTO NHANVIEN (MA_NV, HO_TEN_NV, NGAY_SINH, GIOITINH, SDT, EMAIL, MA_CHUCVU, DIACHI, USERNAME, PASSWORD, ANH_PROFILE, NGAY_DANG_KY, GHI_CHU) VALUES
    ('NV1', 'Trần Thành Phát', '2003-5-13', 'Nam', '0123456789', 'tfastvjppro@gmail.com', 'CV100', 'Hồ Chí Minh', 'admin1', '$2y$10$nF196E7TC1naHst1zddvO.k1xxhpfdx.1ZGI/7LhW9qvDlyASBLhG', 'pic-1.jpg', '2023-5-19', NULL),
    ('NV2', 'Trần Công Hiếu', '2003-4-10', 'Nam', '0987654321', 'hieu@gmail.com', 'CV101', 'Hồ Chí Minh', 'admin2', 'pass1', 'pic-2.jpg', '2023-2-22', NULL),
    ('NV3', 'Vũ Thùy Linh', '2003-2-20', 'Nữ', '0987654321', 'linh@gmail.com', 'CV102', 'Hồ Chí Minh', 'admin3', 'pass1', 'pic-3.jpg', '2023-1-16', NULL),
    ('NV4', 'Phạm Khánh Như', '2003-6-11', 'Nữ', '0987654321', 'nhu@gmail.com', 'CV103', 'Hồ Chí Minh', 'admin4', 'pass1', 'pic-4.jpg', '2023-8-3', NULL),
    ('NV5', 'Nguyễn Duy Nhất', '2003-9-22', 'Nam', '0987654321', 'nhat@gmail.com', 'CV104', 'Hồ Chí Minh', 'admin5', 'pass1', 'pic-5.jpg', '2023-5-6', NULL),
    ('NV6', 'Võ Thành Được', '2003-3-7', 'Nam', '0987654321', 'duoc@gmail.com', 'CV105', 'Hồ Chí Minh', 'admin6', 'pass1', 'pic-6.jpg', '2023-11-20', NULL),
    ('NV7', 'Nguyễn Nhật Hoàng', '2003-4-5', 'Nam', '0987654321', 'hoang@gmail.com', 'CV106', 'Hồ Chí Minh', 'admin7', 'pass1', 'pic-5.jpg','2023-3-30', NULL),
    ('NV8', 'Nguyễn Đức Thắng', '2003-9-23', 'Nam', '0987654321', 'thang@gmail.com', 'CV106', 'Hồ Chí Minh', 'admin8', 'pass1', 'pic-4.jpg', '2023-2-17', NULL);

-- Thêm dữ liệu vào bảng DATTOUR
INSERT INTO DATTOUR (MA_DATTOUR, MA_TOUR, MA_KH, SO_CHO_CANDAT, TRANG_THAI, NGAY_DAT) VALUES
    ('DT01', 'T01', 'KH01', 2, 1, '2023-6-21'),
    ('DT02', 'T02', 'KH02', 3, 0, '2023-4-12'),
    ('DT03', 'T04', 'KH03', 2, 1, '2023-1-2'),
    ('DT04', 'T03', 'KH04', 3, 0, '2023-4-9'),
    ('DT05', 'T05', 'KH05', 2, 1, '2023-5-13'),
    ('DT06', 'T05', 'KH06', 3, 0, '2022-8-26');

-- Thêm dữ liệu vào bảng NHATKY_DATTOUR
INSERT INTO NHATKY_DATTOUR (MA_NKDT, MA_DATTOUR, TIEN_COC, MA_NV) VALUES
    ('NKDT01', 'DT01', 1000000, 'NV4'),
    ('NKDT02', 'DT02', 0, 'NV3'),
    ('NKDT03', 'DT03', 1000000, 'NV2'),
    ('NKDT04', 'DT04', 0, 'NV7'),
    ('NKDT05', 'DT05', 1000000, 'NV6'),
    ('NKDT06', 'DT06', 0, 'NV8');

-- Thêm dữ liệu vào bảng CHITIET_DATTOUR
INSERT INTO CHITIET_DATTOUR (MA_CHITIET_DATTOUR, MA_DATTOUR, HO_TEN, NGAY_SINH, CCCD, GHI_CHU) VALUES
    ('CTDT01', 'DT01', 'Trần Thành Phát', '2003-05-15', '079203006789', 'Ghi chú 1'),
    ('CTDT02', 'DT02', 'Trần Văn Web', '2003-06-24', '035203001234', 'Ghi chú 2'),
    ('CTDT03', 'DT03', 'Liu Nen Mét Si', '2003-05-15', '078203006789', 'Ghi chú 1'),
    ('CTDT04', 'DT04', 'Lữ Thị Thu Bồng', '2002-01-12', '065203001234', 'Ghi chú 2'),
    ('CTDT05', 'DT05', 'Rô Nan Đô', '2003-07-19', '079203006789', 'Ghi chú 1'),
    ('CTDT06', 'DT06', 'Lê Văn Việt', '2002-04-19', '046203001234', 'Ghi chú 2');

-- Thêm dữ liệu vào bảng LICH_TRINH_TOUR
INSERT INTO LICH_TRINH_TOUR (MA_LICHTRINH, MA_TOUR, NGAY_DI, NGAY_VE, SO_CHO_DADAT) VALUES
    ('LT01', 'T01', '2023-08-15', '2023-08-19', 0),
    ('LT02', 'T02', '2023-08-21', '2023-08-25', 0),
    ('LT03', 'T03', '2023-09-11', '2023-09-14', 0),
    ('LT04', 'T04', '2023-09-05', '2023-09-06', 0),
    ('LT05', 'T05', '2023-10-10', '2023-10-12', 0),
    ('LT06', 'T06', '2023-07-22', '2023-07-23', 0),
    ('LT07', 'T07', '2023-11-08', '2023-11-10', 0),
    ('LT08', 'T08', '2023-09-17', '2023-09-18', 0),
    ('LT09', 'T09', '2023-07-14', '2023-07-15', 0),
    ('LT10', 'T10', '2023-09-23', '2023-09-25', 0),
    ('LT11', 'T11', '2023-09-16', '2023-09-18', 0),
    ('LT12', 'T12', '2023-10-01', '2023-10-05', 0),
    ('LT13', 'T13', '2023-12-27', '2023-12-29', 0),
    ('LT14', 'T14', '2023-11-09', '2023-11-15', 0),
    ('LT15', 'T15', '2023-08-22', '2023-08-27', 0),
    ('LT16', 'T16', '2023-10-07', '2023-10-12', 0),
    ('LT17', 'T17', '2023-09-09', '2023-09-13', 0),
    ('LT18', 'T18', '2023-12-12', '2023-12-16', 0);