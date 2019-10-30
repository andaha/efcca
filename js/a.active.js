// JavaScript Document

fvPath = location.pathname;
fvHome = "/index.php";
fvParentStudent = "/parent-students.php";
fvPage = "/page.php";
fvProgrammes = "/programmes.php";

if(fvPath == fvHome) {
	document.getElementById("home").setAttribute(class, "current");
}
else if (fvPath == fvParentStudent) {
	document.getElementById("prntstu").setAttribute(class, "current");
}
else if (fvPath == fvPage) {
	document.getElementById("fvpage").setAttribute(class, "current");
}
else if (fvPath == fvProgrammes) {
	document.getElementById("prgm").setAttribute(class, "current");
}