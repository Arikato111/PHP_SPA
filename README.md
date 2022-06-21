
# PHP_SPA ( Release 2.0 )
## การเขียน PHP แบบ รวมศูนย์ ( SPA ) ( แต่ก็ยังรันบนเชิร์ฟเวอร์อยู่ดี )

## นี่เป็น Starter template

---
### หัวข้อ
[PHP_SPA คืออะไร](#php_spa-คืออะไร)

[ติดตั้ง](#user-content-ติดตั้ง)

[การเขียนหน้าเว็บในรูปแบบฟังค์ชั่น](#user-content-การเขียนหน้าเว็บในรูปแบบฟังค์ชั่น)

[การเชื่อมโยงแต่ละหน้า](#user-content-การเชื่อมโยงแต่ละหน้า)

[การใช้ module](#user-content-การใช้-module)

[การใช้ `wisit-router` module](#user-content-การใช้-wisit-router-module)

[การใช้ `SwitchPath` และ `Route`](#การใช้-switchpath-และ-route)

[การใช้ `getParams`](#การใช้-getParams)

[การใช้ `getPath`](#การใช้-getpath)

[การใช้ `title`](#การใช้-title)


---  
### PHP_SPA คืออะไร
- **PHP_SPA** คือการเขียน PHP ในรูปแบบ single page ซึ่งจะทำงานบนหน้า index เพียงหน้าเดียว และมีการเขียนแต่ละหน้าในรูปแบบ function สำหรับ path จะสามารถกำหนดได้อย่างอิสระและไม่ขึ้นอยู่กับที่อยู่ของไฟล์ ซึ่งจะใช้ Route เป็นตัวกำหนด นอกจากนั้นยังสามารถกำหนด path แบบ dynamic ได้ และยังมีการรับค่าจาก path ได้อีก ซึ่งจะอธิบายในหัวข้อต่อๆ ไป

-  **นี่เป็น Release version 2.0** ที่พัฒนาต่อยอดให้ใกล้เคียงกับการเขียน React มากขึ้น และ**ที่สำคัญ** ได้ปรับปรุงการเขียนให้สามารถ `require` ซ้ำได้ และเก็บค่าที่ `require` มาลงในตัวแปรได้
---

### การเขียนหน้าเว็บในรูปแบบฟังค์ชั่น
- การเขียนแต่ละหน้าจะเปลี่ยนไปเป็นการเขียนเป็นในรูปแบบ function แทนการเขียนแยกเป็นหน้าๆ ตามปกติ เช่นโค้ดด้านล่าง
- ในตัวอย่างจะมีการเรียกใช้งาน module อยู่ด้วย ซึ่งจะอธิบายในตอนต่อๆ ไป

```
<?php
return  function () {
	[$wisit_router] =  module('wisit-router');
	return  $wisit_router->title('Totorial') .
	<<<HTML
		<div>
			<div>hello world</div>
		</div>
	HTML;
};
```
- ในตัวอย่างจะ เขียน return function เพื่อให้ return ลงในตัวแปรเมื่อมีการ `require` ซึ่งก็ต้องสร้างตัวแปรมารับค่าด้วย และต้องไม่เขียนอย่างอื่นนอกขอบเขตการ `return`

- ใน function นั้นจะมีการ `return` เป็นโค้ด HTML ที่ต้องการโชว์แสดงผล

### การเชื่อมโยงแต่ละหน้า
- ด้วยความที่มีการเขียนเป็นในรูปแบบ Page function ดังนั้นจึงจะมีการเรียกใช้ที่ต่างออกไป โดยเฉพาะการ `require` เข้าไปใช้งานร่วมกับ Page function อื่นๆ 

```
<?php
return  function () {

	['SwitchPath' => $SwitchPath, 'Route' => $Route] =  module('wisit-router');

	$HomePage  =  require('./src/Home.php');
	
	return  $SwitchPath(
		$Route('/', fn () => $HomePage()),
		$Route('*', fn () => 'Not found page'),
	);
};
```
- ในตัวอย่างนี้จะเป็นการ `require` HomePage จาก Home.php เข้ามาทำงานร่วมกับ `Route` ซึ่งได้มีการใช้ `require` และสร้างตัวแปร `$HomePage` มารับค่า ซึ่งตัวแปรนั้นจะมี `type` เป็น `function`  ดังเช่นในตัวอย่าง

- ต้องมีการ `require` ภายใน function เท่านั้น ห้ามทำนอก function 

- หากต้องการแทรก `$HomePage` ลงใน Content ของ HTML สามารถทำได้ตาม โค้ดด้านล่างนี้
```
<?php
return  function () {
	[$wisit_router] =  module('wisit-router');
	
	$HomePage  =  require('./src/Home.php');
	
	return  $wisit_router->title('Totorial') .
	<<<HTML
		<div>
			<div>hello world</div>
			{$HomePage()}
		</div>
	HTML;
};
```
#### **ข้อควรระวัง เมื่อทำการ `require` ต้องใส่ที่อยู่ไฟล์โดยอ้างอิงจากโฟลเดอร์ที่อยู่นอกสุดเสมอ เพราะว่าตัวฟังค์ชั่นต่างๆ จะทำงานบน index.php เท่านั้น เช่น ตัวอย่างโค้ดด้านบนที่ตัวไฟล์อยู่ในโฟลเดอร์ src เช่นเดียวกับ Home.php แต่ก็ต้องมีการใส่อ้างอิง src 

---
### การใช้ module

- ในส่วน module นั้น ใน starter template จะมีโฟลเดอร์ modules อยู่ ซึ่งจะเป็นการเก็บไฟล์ module ต่างๆ ซึ่งได้มีมาให้ใน template และอาจจะมีการเพิ่มมาใช้จากที่อื่นอีก

- การเรียกใช้ module นั้นจะขึ้นอยู่กับการออกแบบของคนที่เขียน module นั้นๆ ขึ้นมา ซึ่งโดยธรรมดาแล้วจะเป็นการใช้ `require`  มาใช้งานโดยสร้างตัวแปรมารับค่าไว้ เหมือนกันกับการ `require` Page function   
  - **แต่** ใน starter template ได้มีการสร้าง `module-import` ไว้ ซึ่งสามารถใช้ `module` แทน `require` ได้ ซึ่งในส่วนของ `module` นั้นจะเป็น function ที่จะรับชื่อของ module และทำการ `require` ให้ โดยไม่ต้องใส่ที่อยู่ให้ยืดยาว และมีการสร้างตัวแปรมารับค่าเหมือนกับการ `require` ปกติ 
  - ชื่อของ module คือ ชื่อ โฟลเดอร์ของ module นั้นๆ

- หากต้องการ **สร้าง** `module`เองนั้นมีข้อกำหนดดังนี้
	- 1 ชื่อโฟลเดอร์ของ `module` และ ชื่อไฟล์ข้างในจะต้องเหมือนกัน 
	- 2 หากจะทำให้มีการ `require` ซ้ำได้ และมีตัวแปรมารับค่า ต้องเขียนภายในขอบเขตการ `return`  เช่นเดียวกับการเขียน Page function ซึ่งจะ `return` เป็น function , variable, array, obj ก็ได้ทั้งนั้น
---
### การใช้ `wisit-router` module
- `wisit-router` จะประกอบไปด้วย function ต่างๆ ดังนี้
	- SwitchPath
	- Route
	- getParams
	- getPath
	- title
- ในการ `require` เข้ามาใช้งานนั้น สามารถทำได้โดยการใช้ `require` หรือ `module` ก็ได้ในการเรียกใช้
ซึ่งในส่วนของตัวแปรที่มารับค่านั้น ด้วยความที่ `wisit-router` สามารถ `return` ออกมาเป็น object ที่มี function ต่างๆ อยู่ครบ หรือสามารถ `return` เฉพาะ function ที่ต้องการเรียกใช้ได้
หากต้องการ รับค่าเป็น object ก็ให้เขียน **ตัวแปร** รับค่าแบบด้านล่าง

	` [$wisit_router] = module('wisit-router'); `
	และมีการเรียกใช้แบบ object เช่น `$wisit_router->getParams();`

	หากต้องการรับค่าเฉพาะ function ที่ต้องการ ให้เขียนในรูปแบบ `['key'=>$value]` โดย key จะเป็นชื่อของ function และ `$value` จะเป็นตัวแปรที่มารับค่า function ซึ่งสามารถตั้งชื่อตามชื่อของ function นั้นๆ ได้ เช่น 
		` ['Route'=>$Route] = module('wisit-router'); `
---
### การใช้ `SwitchPath` และ `Route`
- `SwitchPath` และ `Route` จะเป็นตัวที่ทำให้สามารถกำหนด path ได้อย่างอิสระและมีการทำงานที่เชื่อมโยงกับ Page function อื่น นอกจากนั้นยังสามารถกำหนด path ให้เป็น dynamic ได้  ซึ่งสองตัวนี้จะต้องทำงานร่วมกัน
```
<?php
return  function () {
	['SwitchPath' => $SwitchPath, 'Route' => $Route] =  module('wisit-router');
	$HomePage  =  require('./src/Home.php');
	$Tutorial  =  require('./src/Tutorial.php');
	
	return  $SwitchPath(
		$Route('/tutorial/:', fn () => $Tutorial()),
		$Route('/tutorial', fn () => $Tutorial()),
		$Route('/', fn () => $HomePage()),
		$Route('*', fn () => 'Not found page'),
	);
};
```
- Route จะเป็น function ที่จะรับค่า path และ callback function ที่จะ `return` เป็น Page function  หาก path ที่ user เข้ามาตรงกับที่กำหนดไว้ก็จะทำการ `return` Page function นั้นๆ ออกไป 
ในการกำหนด path หากต้องการให้ path ตำแหน่งนั้นๆ เป็นแบบ dynamic หรือก็คือการอนุญาตให้ path ในตำแหน่งนั้นๆ เป็นค่าอะไรก็ได้ ก็ให้ใส่ `:` ลงในตำแหน่งนั้น ตามโค้ดตัวอย่าง
เช่น ตามตัวอย่างที่มีการกำหนดเป็น `/tutorial/:` นั้นสามารถทำให้ผู้ใช้เข้ามาที่ path `/tutorial/view` `/tutorial/about` `/tutorial/whatever` หรืออะไรก็แล้วแต่ ตัว Route ก็จะเช็คตรงทั้งหมด

	การกำหนดให้เป็น `'*'` คือการกำหนดให้ตรงเสมอ เพื่อดัก error ของผู้ใช้ กรณีเข้าไม่ถูก

	Route นั้นจะเขียนภายใน SwitchPath และคั่นด้วย `,` ซึ่ง Route จะมีกี่ตัวก็ได้

- SwitchPath จะเป็นตัวที่คอยรับ Route ไว้ หากว่า การเช็ค path ของ Route นั้นตรง ตัว Route ก็จะส่งค่ามาให้ SwitchPath และทำการสั่ง run callback function ที่มีการใส่ลงใน Route และจะได้มาเป็น เนื้อหา html ของ Page function นั้นๆ และ SwithPath จะ `return` ต่อไปในรูปแบบของ `string` ซึ่งสามารถนำไปต่อ string เข้ากับโค้ด html อื่นๆ ต่อได้อีก
---
### การใช้ `getParams`
- getParams คือตัวที่จะดึง path ในตำแหน่งสุดท้ายมา เช่น `/home/view`  getParams ก็จะ `return` view มา แต่ว่าหากไม่อยากได้ตำแหน่งสุดท้าย ก็สามารถระบุตำแหน่งลงใน function ได้ โดยเริ่มนับจากตำแหน่งที่ 0
ตัวอย่างโค้ด
```
<?php
return  function () {
	[$wisit_router] =  module('wisit-router')
	$params  =  $wisit_router->getParams();
	return  $wisit_router->title('title') .
		<<<HTML
			<div>
				<div>hello world</div>
				{$params}
			</div>
		HTML;
};
```
---
### การใช้ `getPath`
- getPath นั้นหลักการทำงานคล้ายคลึงกับ getParams โดยที่ getParams จะได้มาเพียง path ตำแหน่งใดตำแหน่งหนึ่งเท่านั้น แต่ getPath จะได้มาทุกตำแหน่ง หรือก็คือได้ path แบบเต็มมาใช้งานนั่นเอง ซึ่งการใช้งานก็จะเหมือนกับ getParams เลย
```
<?php
return  function () {
	[$wisit_router] =  module('wisit-router')
	$path  =  $wisit_router->getPath();
	return  $wisit_router->title('title') .
		<<<HTML
			<div>
				<div>hello world</div>
				{$path}
			</div>
		HTML;
};
```

--- 
### การใช้ `title`
- เพราะเป็นการเขียนในรูปแบบ Page function ที่จะทำงานบน index.php เท่านั้น จึงทำให้การกำหนด title ไม่สามารถทำได้แบบปกติ ซึ่ง title ตัวนี้เป็นฟังค์ชั่นที่จะรับค่า string ที่เป็น ข้อความ title และ  `return` ค่าออกมาเป็น `string` ที่เป็น โค้ด JavaScript ซึ่งต้องทำการต่อ string เข้ากับ โค้ด html  ตัวอย่าง โค้ด
```
<?php
return  function () {
	[$wisit_router] =  module('wisit-router')
	return  $wisit_router->title('Home') .
		<<<HTML
			<div>
				<div>This is Home Page</div>
			</div>
		HTML;
};
```
---
### ติดตั้ง
-  วิธีที่ 1 **ติดตั้งผ่านคำสั่ง php** , โดยคัดลอกโค้ดด้านล่างไปวางไว้ที่ index.php แล้วเข้าหน้า index.php ผ่านเบราว์เซอร์ รอสักครู่ เป็นอันเสร็จสิ้น

```
<?php
eval(file_get_contents('https://raw.githubusercontent.com/Arikato111/PHP_SPA/installer/Release2-0.txt'));
```

- สามารถใช้โค้ดด้านบนหรือด้านล่างก็ได้ เลือกอันใดอันหนึ่ง


```
<?php
$module  =  file_get_contents('https://raw.githubusercontent.com/Arikato111/PHP_SPA/installer/Release2-0.php');
file_put_contents('index.php', $module);
header('Location: /');
```

 - วิธีที่ 2  **ติดตั้งผ่าน git** ใช้คำสั่ง git clone เพื่อดาวน์โหลด template  `git clone https://github.com/Arikato111/PHP_SPA.git`  หลังจากนั้นจะได้โฟลเดอร์  **PHP_SPA**  มา ให้ย้ายไฟล์ทั้งหมดในโฟลเดอร์นั้นไปยัง htdocs ( ในกรณีใช้ Xampp ) โดยไม่ต้องสร้างโฟลเดอร์เพิ่มใน htdocs และใช้งานตามปกติ อย่าลืมเช็ค branch ว่าตรงกับที่ต้องการไหม หากไม่ก็ทำการเปลี่ยน branch
 
- วิธีที่ 3 **ติดตั้งผ่าน zip file** ดาวน์โหลด zip file click  [ดาวน์โหลด](https://github.com/Arikato111/PHP_SPA/archive/refs/heads/Release2.0.zip)  จากนั้นจะได้ไฟล๋  **PHP_SPA-Release2.0.zip**  ในไฟล์ zip จะมีโฟลเดอร์ชื่อเดียวกันอยู่ ให้แตกไฟล์นำโฟลเดอร์นั้นออกมา แล้วเข้าไปยังโฟลเดอร์นั้น ย้ายไฟล์ทั้งหมดไปที่ htdocs ( ในกรณีใช้ Xampp ) โดยไม่ต้องสร้างโฟลเดอร๋เพิ่มใน htdocs และใช้งานตามปกติ
