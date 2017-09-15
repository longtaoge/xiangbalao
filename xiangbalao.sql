-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017-09-16 01:27:46
-- 服务器版本： 5.5.28
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xiangbalao`
--

-- --------------------------------------------------------

--
-- 表的结构 `xb_access`
--

CREATE TABLE IF NOT EXISTS `xb_access` (
  `access_id` int(11) NOT NULL COMMENT 'id',
  `lastIp` varchar(15) DEFAULT NULL COMMENT '????IP',
  `lastTime` int(11) DEFAULT NULL COMMENT '????ʱ??',
  `assess_count` varchar(15) DEFAULT NULL COMMENT '???ʴ???'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `xb_brand`
--

CREATE TABLE IF NOT EXISTS `xb_brand` (
  `brand_id` int(11) NOT NULL COMMENT 'id',
  `category_id` int(11) NOT NULL COMMENT '???ڷ???????',
  `brand_name` varchar(15) NOT NULL COMMENT '??ƷƷ??????',
  `brand_logo` varchar(50) DEFAULT NULL COMMENT 'Ʒ??LOGO??ַ',
  `ishot` tinyint(4) NOT NULL DEFAULT '1' COMMENT '?Ƿ????? 1:?? 0: ???? ',
  `isDelete` tinyint(4) NOT NULL DEFAULT '1' COMMENT '?Ƿ???ʾ 0:????ʾ, 1: ??ʾ '
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `xb_brand`
--

INSERT INTO `xb_brand` (`brand_id`, `category_id`, `brand_name`, `brand_logo`, `ishot`, `isDelete`) VALUES
(1, 1, '双汇', './Public/upload/2017091514-33-46radish.jpg', 1, 1),
(2, 1, '金锣', './Public/upload/2017091514-34-19radish.jpg', 1, 1),
(3, 1, '刘老根', './Public/upload/2017091514-44-34radish.jpg', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `xb_category`
--

CREATE TABLE IF NOT EXISTS `xb_category` (
  `category_id` int(11) NOT NULL COMMENT 'id',
  `catagory_name` varchar(15) NOT NULL COMMENT '??Ʒ????????',
  `isDelete` tinyint(4) NOT NULL DEFAULT '1' COMMENT '?Ƿ???ʾ 0:????ʾ, 1: ??ʾ '
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `xb_category`
--

INSERT INTO `xb_category` (`category_id`, `catagory_name`, `isDelete`) VALUES
(1, '火腿肠', 1),
(2, '乡吧佬', 1),
(3, '肉制品', 1),
(4, '休闲食品', 1);

-- --------------------------------------------------------

--
-- 表的结构 `xb_goods`
--

CREATE TABLE IF NOT EXISTS `xb_goods` (
  `goods_id` int(11) NOT NULL COMMENT 'id',
  `category_id` int(11) NOT NULL COMMENT '???ڷ???id',
  `brand_id` int(11) NOT NULL COMMENT 'Ʒ??id',
  `goods_name` varchar(30) NOT NULL COMMENT '??Ʒ??',
  `goods_weight` float DEFAULT NULL COMMENT '????',
  `goods_price` float DEFAULT NULL COMMENT '?Żݼ?',
  `goods_oldPrice` float DEFAULT NULL COMMENT 'ԭʼ??',
  `goods_pic` varchar(100) DEFAULT NULL COMMENT 'ͼƬ??ַ',
  `goods_pic_thum` varchar(100) DEFAULT NULL COMMENT '????ͼ',
  `goods_best_date` varchar(10) DEFAULT NULL COMMENT '??????',
  `goods_place` varchar(50) DEFAULT NULL COMMENT '????',
  `goods_detail` text COMMENT '??Ʒ????',
  `goods_num` int(11) DEFAULT NULL COMMENT '????????',
  `goods_add_time` int(11) DEFAULT NULL COMMENT '????ʱ??'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `xb_goods`
--

INSERT INTO `xb_goods` (`goods_id`, `category_id`, `brand_id`, `goods_name`, `goods_weight`, `goods_price`, `goods_oldPrice`, `goods_pic`, `goods_pic_thum`, `goods_best_date`, `goods_place`, `goods_detail`, `goods_num`, `goods_add_time`) VALUES
(1, 1, 1, '双汇王中王35g代', 3, 60, 60, './Public/upload/2017091600-00-56541.jpg', './Public/upload/2017091600-00-56541_100x75.jpg', '180', '河南', '<span style="font-size: 13.3333px;">&nbsp; &nbsp;30g代双汇王中王 &nbsp; &nbsp;<br/></span><p><span style="font-size: 13.3333px;"> &nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 13.3333px;">30g*8支10代</span></span><br/></p><p><span style="font-size: 13.3333px;"><span style="font-size: 13.3333px;"><br/></span></span></p><p><img src="/Public/ueditor/upload/image/20170916/1505491479949324.jpg" title="1505491479949324.jpg" alt="541.jpg" width="827" height="523"/></p><p><span style="font-size: 13.3333px;"><span style="font-size: 13.3333px;"><br/></span></span></p><p><span style="font-size: 13.3333px;"><span style="font-size: 13.3333px;"><br/></span></span></p><p><br/></p>', 88, 1505491800),
(2, 1, 1, '40g玉米热狗', 40, 49, 52, './Public/upload/2017091600-13-014551.jpg', './Public/upload/2017091600-13-014551_100x75.jpg', '180', '河南', '<p>40g玉米热狗<span style="white-space: pre;">	</span>件<span style="white-space: pre;">	</span>40g*60支</p><p><br/></p><p><img src="/Public/ueditor/upload/image/20170916/1505492143749398.jpg" title="1505492143749398.jpg" alt="4551.jpg" width="411" height="465"/></p>', 88, 1505492190),
(3, 1, 2, '60g金锣鸡肉肠', 3, 33, 35, './Public/upload/2017091600-25-25jirou.jpg', './Public/upload/2017091600-25-25jirou_100x57.jpg', '180', '泰安', '<p>60g金锣鸡肉肠</p><p>60g*50支<span style="white-space: pre;">	</span></p><p><br/></p><p><img src="/Public/ueditor/upload/image/20170916/1505492833136531.jpg" alt="1505492833136531.jpg" width="548" height="336"/></p><p><br/></p><p><br/></p>', 88, 1505492939),
(4, 1, 1, '65g东北鸡肉香肠', 3, 36, 36, './Public/upload/2017091600-33-38jirou.jpg', './Public/upload/2017091600-33-38jirou_100x75.jpg', '180', '河南', '<p>65g东北鸡肉香肠<span style="white-space: pre;">	</span>件<span style="white-space: pre;">	</span>65g*50<span style="white-space: pre;">	</span></p><p><br/></p><p><img src="/Public/ueditor/upload/image/20170916/1505493315577787.jpg" title="1505493315577787.jpg" alt="jirou.jpg" width="556" height="487"/></p>', 888, 1505493373);

-- --------------------------------------------------------

--
-- 表的结构 `xb_news`
--

CREATE TABLE IF NOT EXISTS `xb_news` (
  `news_id` int(11) NOT NULL COMMENT 'id',
  `title` varchar(50) DEFAULT NULL COMMENT '????',
  `content` text COMMENT '????',
  `type` int(11) DEFAULT NULL COMMENT '1 ??˾??̬ 2???????? 3 ?ɹ?????',
  `author` varchar(10) DEFAULT NULL COMMENT '????',
  `source` varchar(20) DEFAULT NULL COMMENT '??Դ',
  `publish_time` int(11) DEFAULT NULL COMMENT '????ʱ??'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `xb_news`
--

INSERT INTO `xb_news` (`news_id`, `title`, `content`, `type`, `author`, `source`, `publish_time`) VALUES
(1, '热烈祝贺中国乡巴佬食品QQ群正式成立', '<p><span style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; color: rgb(102, 102, 102); font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; text-indent: 28px; background-color: rgb(255, 255, 255); font-size: 14pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;河北石家庄乡巴佬食品批发中心 &nbsp; ( 已更名为虎子食品) ，为了方便全国乡吧佬食品行业精英的交流，特意创立了中国乡巴佬食品QQ群，凡是从事乡巴佬相关产业的社会人士，不分种族、年龄</span><span style="color: rgb(102, 102, 102); font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; font-size: 14px; text-indent: 28px; background-color: rgb(255, 255, 255);">、</span><span style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; color: rgb(102, 102, 102); font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; text-indent: 28px; background-color: rgb(255, 255, 255); font-size: 14pt;">肤色</span><span style="color: rgb(102, 102, 102); font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; font-size: 14px; text-indent: 28px; background-color: rgb(255, 255, 255);">、</span><span style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; color: rgb(102, 102, 102); font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; text-indent: 28px; background-color: rgb(255, 255, 255); font-size: 14pt;">职业、所受教育程度等，均可申请加入本群，同时，在群内各位朋友请尊守国家相关法规，互相尊重，互相帮助，共同打造强大的乡吧佬食品事业，中国乡巴佬群号为：</span><span style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; font-size: 14px; text-indent: 28px; background-color: rgb(255, 255, 255); color: rgb(0, 0, 255);"><span style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; font-size: 16pt;">226179272</span></span><span style="color: rgb(102, 102, 102); font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; font-size: 14px; text-indent: 28px; background-color: rgb(255, 255, 255);">，</span><span style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; color: rgb(102, 102, 102); font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; text-indent: 28px; background-color: rgb(255, 255, 255); font-size: 14pt;">即日起向全国开放，各位在申请加入前，请标明地区，职业，进群目的，否则不余予通过。</span></p><p><span style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; color: rgb(102, 102, 102); font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; text-indent: 28px; background-color: rgb(255, 255, 255); font-size: 14pt;"><br/></span></p><p><span style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; color: rgb(102, 102, 102); font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; text-indent: 28px; background-color: rgb(255, 255, 255); font-size: 14pt;"><span style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; color: rgb(102, 102, 102); font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; text-indent: 28px; background-color: rgb(255, 255, 255); font-size: 12pt;">&nbsp; 乡吧佬群管委会</span><span style="color: rgb(102, 102, 102); font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; font-size: 14px; text-indent: 28px; background-color: rgb(255, 255, 255);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2012年4月6日</span></span></p><p><span style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; color: rgb(102, 102, 102); font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; text-indent: 28px; background-color: rgb(255, 255, 255); font-size: 14pt;"><br/></span></p>', 1, 'longtoage', '乡吧佬食品网', 1505493720),
(2, '乡巴佬食品配方与区域化营销', '<p><span style="color: rgb(102, 102, 102); font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; font-size: 18.6667px; text-indent: 28px; background-color: rgb(255, 255, 255);">在开始这个话题之前，我们先要明确一个概念性的问题，那就是，什么是营销？有人说，推销是指卖那些生产出来的东西，营销是指生产那些能够卖得出去的产品，教科书或字典绝对不会这样解释这两个词的关系，但这句话却深刻简明，一言中的。</span><br/><span style="color: rgb(102, 102, 102); font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; font-size: 18.6667px; text-indent: 28px; background-color: rgb(255, 255, 255);">&nbsp;&nbsp;&nbsp; &nbsp; 有很多企业家整天为积压的产品发愁，这大致是因为没有明白，企业的任务关键在于断定目标市场消费者的需求和欲望，并且要比竞争者更好地满足消费者的需求这个简单的道理吧。</span><br/><span style="color: rgb(102, 102, 102); font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; font-size: 18.6667px; text-indent: 28px; background-color: rgb(255, 255, 255);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 再简单一点说，就是一个企业不景气，一定是营销出了问题，一个企业倒闭，多数是不懂得推销。</span><br/><span style="color: rgb(102, 102, 102); font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; font-size: 18.6667px; text-indent: 28px; background-color: rgb(255, 255, 255);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 也许你会问了，那这与</span><a href="http://xiangbalaopifa.b2b.hc360.com/shop/infodetail.html?providerid=100015625417&ciid=3469474&psort=0#" style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; outline: none; color: rgb(0, 0, 0); text-decoration-line: none; font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; font-size: 18.6667px; text-indent: 28px; white-space: normal; background-color: rgb(255, 255, 255);">乡巴佬</a><span style="color: rgb(102, 102, 102); font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; font-size: 18.6667px; text-indent: 28px; background-color: rgb(255, 255, 255);">食品的配方有什么关系呢？其实很简单了，因为不同区域的人们对食品配方的需求不一样，要想在每一个地方畅销，就要符合每一个地域民众对产品差异化需求。比如说，湖南或四川的人们喜欢吃辣味，河北、东北地区的人们喜欢吃略带咸味的东西，而广东地区则喜欢甜味食品，而西北地区的伊斯兰教兄弟只吃清真食品。</span><br/><span style="color: rgb(102, 102, 102); font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; font-size: 18.6667px; text-indent: 28px; background-color: rgb(255, 255, 255);">&nbsp;&nbsp;&nbsp;&nbsp; 我们中国有一句古话叫做众口难调，假如想用一个配方生产出来的产品满足全国人民的需求那几乎是不可能的，因此，我们可以根据不同地区人们生活习惯和喜好，对产品的配方适当的调整一下，这样，给湖南的</span><a href="http://xiangbalaopifa.b2b.hc360.com/shop/infodetail.html?providerid=100015625417&ciid=3469474&psort=0#" style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; outline: none; color: rgb(0, 0, 0); text-decoration-line: none; font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; font-size: 18.6667px; text-indent: 28px; white-space: normal; background-color: rgb(255, 255, 255);">乡巴佬鸡腿</a><span style="color: rgb(102, 102, 102); font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; font-size: 18.6667px; text-indent: 28px; background-color: rgb(255, 255, 255);">就多放些辣椒，给河北的</span><a href="http://xiangbalaopifa.b2b.hc360.com/shop/infodetail.html?providerid=100015625417&ciid=3469474&psort=0#" style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; outline: none; color: rgb(0, 0, 0); text-decoration-line: none; font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; font-size: 18.6667px; text-indent: 28px; white-space: normal; background-color: rgb(255, 255, 255);">乡巴佬鸡爪</a><span style="color: rgb(102, 102, 102); font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; font-size: 18.6667px; text-indent: 28px; background-color: rgb(255, 255, 255);">就多放点盐巴，给广东的乡巴佬卤蛋就放点砂糖，虽然配方上稍有差别，却达到了全国人民都喜欢吃的效果，当然，假如全国市场都投放同一种配方的产品，可能会出现这样的境况，很多朋友吃了以后就说“怎么这个味道呀？”</span><br/><span style="color: rgb(102, 102, 102); font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; font-size: 18.6667px; text-indent: 28px; background-color: rgb(255, 255, 255);">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 调料的配方仅仅是其中的一部分，每个地区人们对产品色泽和包装的需求也存在着类似的不同，因此，认真做好市场需求的调研，适当的调整不同地区产品的包装、色泽、口味的配方等，将使产品受到更广泛的欢迎。</span></p>', 2, 'longtoage', '乡吧佬食品网', 1505493924),
(3, '乡巴佬食品OEM贴牌与品牌营销战略', '<p style="margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 10px; list-style: none; box-shadow: none; border-radius: 0px; border: none; font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; text-indent: 2em; color: rgb(102, 102, 102); font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;"><span style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; color: rgb(0, 0, 255);"><span style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; font-size: 14pt;">今天我们要谈一谈OEM与品牌建设，那么什么是OEM呢？OEM 是英文Original Equipment Manufacturer的首字母缩写，直译过来就是原始设备制造商，通俗的讲就是代加工或者贴牌制作，在中国的深圳和东莞等地，有为别人提供代加工的大 量工厂，还有大量提供类似服务的“三来一补”(来料加工、来样加工、来件装配和补偿贸易)、“来料加工”等的企业。</span></span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 10px; list-style: none; box-shadow: none; border-radius: 0px; border: none; font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; text-indent: 2em; color: rgb(102, 102, 102); font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;"><span style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; color: rgb(0, 0, 255);"><span style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; font-size: 14pt;">&nbsp;&nbsp;&nbsp;&nbsp; OEM成就了世界上诸多著名的顶级公司，也造就了世界上诸多著名的品牌，如苹果公司的iPhone、iPad，耐克运动装公司的NIKE等。</span></span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 10px; list-style: none; box-shadow: none; border-radius: 0px; border: none; font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; text-indent: 2em; color: rgb(102, 102, 102); font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;"><span style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; color: rgb(0, 0, 255);"><span style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; font-size: 14pt;"><br/></span></span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 10px; list-style: none; box-shadow: none; border-radius: 0px; border: none; font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; text-indent: 2em; color: rgb(102, 102, 102); font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;"><span style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; color: rgb(0, 0, 255);"><span style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; font-size: 14pt;">&nbsp;&nbsp;&nbsp;&nbsp; 当前，中国拥有世界上数量最多的OEM代加工企业，因此，常常有人抱怨说，中国人辛辛苦苦做出来的产品，加上别人的品牌就能增加好几倍的价格。</span></span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 10px; list-style: none; box-shadow: none; border-radius: 0px; border: none; font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; text-indent: 2em; color: rgb(102, 102, 102); font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;"><span style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; color: rgb(0, 0, 255);"><span style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; font-size: 14pt;"><br/></span></span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 10px; list-style: none; box-shadow: none; border-radius: 0px; border: none; font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; text-indent: 2em; color: rgb(102, 102, 102); font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;"><span style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; color: rgb(0, 0, 255);"><span style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; font-size: 14pt;">&nbsp;&nbsp;&nbsp;&nbsp; 对于这个问题，我们要一分为二的看，坦然的讲，目前中国还属于落后国家，就像一个胸怀大志的大学毕业生，虽怀着改造世界的梦想，却不得不为了一日三餐奔走，从为别人打工做起，当有了一定积蓄、经验、人脉，有了更多的行业知识，自然开始创立自己的事业。</span></span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 10px; list-style: none; box-shadow: none; border-radius: 0px; border: none; font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; text-indent: 2em; color: rgb(102, 102, 102); font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;"><span style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; color: rgb(0, 0, 255);"><span style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; font-size: 14pt;">&nbsp;&nbsp;&nbsp;&nbsp; 当下，在中国，专业分工越来越明确，人们之间的思维和眼界也逐渐产生了距离，在这种情况下，出现了有些企业会生产，不会销售的情况，也产生了有人懂营销却没有资金开办工厂的局面。同样，乡巴佬食品行业，也存在这种现象：有些<a href="http://www.xiangbalao.org/" target="_blank" style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; outline: none; color: rgb(0, 0, 0); text-decoration-line: none;">乡巴佬</a>厂只会生产，却不懂销售，而有些流通环节的经销商有大量的销售网络，却没有精力开厂。经销商觉得是为厂家创品牌，所以希望厂家投入大量的宣传广告等前期投入，而厂家又怕经销商不全力推广而白白浪费了自己的财力。这就产生了一种矛 盾，使生产企业和经销商难以密切合作。</span></span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 10px; list-style: none; box-shadow: none; border-radius: 0px; border: none; font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; text-indent: 2em; color: rgb(102, 102, 102); font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;"><span style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; color: rgb(0, 0, 255);"><span style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; font-size: 14pt;"><br/></span></span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 10px; list-style: none; box-shadow: none; border-radius: 0px; border: none; font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; text-indent: 2em; color: rgb(102, 102, 102); font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;"><span style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; color: rgb(0, 0, 255);"><span style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; font-size: 14pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 那这与OEM贴牌代加工有什么联系呢？我们可以设想，假如今天工厂生产出来的产品是带着经销商的品牌，那么还怕经销商不尽力去推广么，而经销商呢，假如是 为自己做品牌，还期待别人给自己投入广告费么？就目前来讲，中国允许同一商品上可以有两种商标同时标注，比如说，生产企业的商标是“乡吧佬”，经销商的商 标是“老北京”那么，经销商可以向厂家订做一种“老北京乡吧佬”产品，这样一来，一举两得，即成就了老北京，也成就了乡吧佬。</span></span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 10px; list-style: none; box-shadow: none; border-radius: 0px; border: none; font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; text-indent: 2em; color: rgb(102, 102, 102); font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;"><span style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; color: rgb(0, 0, 255);"><span style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; font-size: 14pt;"><br/></span></span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 10px; list-style: none; box-shadow: none; border-radius: 0px; border: none; font-family: &quot;Microsoft YaHei&quot;, MicrosoftJhengHei; text-indent: 2em; color: rgb(102, 102, 102); font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255); text-align: center;"><span style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; color: rgb(0, 0, 255);"><span style="margin: 0px; padding: 0px; list-style: none; box-shadow: none; border-radius: 0px; font-size: 14pt;">&nbsp;&nbsp;&nbsp;&nbsp; 相信，不久的将来，国内也将出现大量以贴牌代加工为依托的生产-经销形式，同时造就更多的生产企业和经销商</span></span></p><p><br/></p>', 2, 'longtoage', '乡吧佬食品网', 1505494731);

-- --------------------------------------------------------

--
-- 表的结构 `xb_photo`
--

CREATE TABLE IF NOT EXISTS `xb_photo` (
  `photo_id` int(11) NOT NULL COMMENT 'id',
  `photo_url` varchar(100) DEFAULT NULL COMMENT 'ͼƬ??ַ',
  `photo_thum_url` varchar(100) DEFAULT NULL COMMENT 'ͼƬ??ַ',
  `photo_des` varchar(30) DEFAULT NULL COMMENT 'ͼƬ????',
  `goods_id` int(11) DEFAULT NULL COMMENT '??ƷID',
  `brand_id` int(11) DEFAULT NULL COMMENT 'Ʒ??id',
  `category_id` int(11) DEFAULT NULL COMMENT '????id',
  `type_flag` int(11) DEFAULT NULL COMMENT '??????????־'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `xb_user`
--

CREATE TABLE IF NOT EXISTS `xb_user` (
  `id` int(11) NOT NULL COMMENT 'id',
  `username` varchar(10) NOT NULL COMMENT '?û???',
  `password` varchar(40) NOT NULL COMMENT '????',
  `lastTime` int(11) DEFAULT NULL COMMENT '??????¼ʱ??',
  `lastIp` varchar(15) DEFAULT NULL COMMENT '??????¼ip',
  `nickname` varchar(15) DEFAULT NULL COMMENT '?س?',
  `role` int(11) NOT NULL DEFAULT '0' COMMENT '?û???ɫ 1 ????????Ա 0 ??ͨ????Ա',
  `phone` varchar(11) DEFAULT NULL COMMENT '?绰????'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `xb_user`
--

INSERT INTO `xb_user` (`id`, `username`, `password`, `lastTime`, `lastIp`, `nickname`, `role`, `phone`) VALUES
(1, 'longtaoge', 'dff0d7871f8ccba56ed2592efc2e43c4c6479fdf', 1505491163, '127.0.0.1', 'longtaoge', 1, '13167389338'),
(2, 'xiangbalao', '2d3d5de0dafef8c9391bad4a80b263bdf95a5cfe', 1505491233, '127.0.0.1', 'xiangbalao', 1, '13167389338');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `xb_access`
--
ALTER TABLE `xb_access`
  ADD PRIMARY KEY (`access_id`);

--
-- Indexes for table `xb_brand`
--
ALTER TABLE `xb_brand`
  ADD PRIMARY KEY (`brand_id`),
  ADD UNIQUE KEY `brand_name` (`brand_name`);

--
-- Indexes for table `xb_category`
--
ALTER TABLE `xb_category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `catagory_name` (`catagory_name`);

--
-- Indexes for table `xb_goods`
--
ALTER TABLE `xb_goods`
  ADD PRIMARY KEY (`goods_id`);

--
-- Indexes for table `xb_news`
--
ALTER TABLE `xb_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `xb_photo`
--
ALTER TABLE `xb_photo`
  ADD PRIMARY KEY (`photo_id`);

--
-- Indexes for table `xb_user`
--
ALTER TABLE `xb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `xb_access`
--
ALTER TABLE `xb_access`
  MODIFY `access_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id';
--
-- AUTO_INCREMENT for table `xb_brand`
--
ALTER TABLE `xb_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `xb_category`
--
ALTER TABLE `xb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `xb_goods`
--
ALTER TABLE `xb_goods`
  MODIFY `goods_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `xb_news`
--
ALTER TABLE `xb_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `xb_photo`
--
ALTER TABLE `xb_photo`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id';
--
-- AUTO_INCREMENT for table `xb_user`
--
ALTER TABLE `xb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
