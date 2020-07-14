import java.io.*;
import java.util.*;


public class Demo{
	//创建医生对象
	static doctor d1 = new doctor ("张三",4,10,"内科");
	static doctor d2 = new doctor ("张四",6,20,"外科");
	//创建病人对象
	static patient p1 = new patient (100,"王五","男",23);
	static patient p2 = new patient (200,"王六","女",26);
	//创建科室对象
	static department dep1 = new department ("内科");
	static department dep2 = new department ("外科");
	//主方法
	public static void main(String[] args){
		main_menu();//启动main_menu（主选单）方法
	}
	//主选单
	public static void main_menu(){
		System.out.println("请选择您的人群类型：\n1.医生    2.病人");
		System.out.print("请键入代码：");
		Scanner input = new Scanner (System.in);
		int person_num = input.nextInt();
		switch (person_num){
			case 1 : d_menu();
			break;
			case 2 : p_menu();
			break;
			default : System.out.println("input error!");
		}
	}
	//医生选单
	public static void d_menu(){
		System.out.print("输入您的医生编号：");
		Scanner input = new Scanner (System.in);
		int d_num = input.nextInt();
		switch (d_num){
			case 10 :d1.set_tra_time("内科");
			break;
			case 20 : d2.set_tra_time("外科");
			break;
			default : System.out.println("input error!");
		}
	}
	//病人选单
	public static void p_menu(){
		System.out.print("请输入您的病历编号：");
		Scanner input = new Scanner (System.in);
		int p_num = input.nextInt();
		switch (p_num){
			case 100 : p1.set_exa_time("");
			break;
			case 200 : p2.set_exa_time("");
			break;
			default : System.out.println("input error!");
		}
	}
	
	void list_libout(String dep){
		String st = dep;
		if(st== "内科"){
			d1.libout();
		}
		else{
			if(st == "外科"){
				d2.libout();
			}
			else{
				System.out.println("none data.");
			}
		}
	}
			
}

class department{
	/**
	*科室分类    编号
	*内科        100
	*外科        200
	*/
	String dep_name;
	Demo d = new Demo();
	department(String dep_name){
		this.dep_name = dep_name;
	}
	int set_tra_time(){
		System.out.println("这是医生更改时间的界面。");
		System.out.print("请输入坐诊时间：");
		Scanner input = new Scanner(System.in);
		int week = input.nextInt();
		return week ;
	}
	int set_exa_time(){
		System.out.println("这是病人选择预约的界面。");
		System.out.print("请输入预约时间：");
		Scanner input = new Scanner(System.in);
		int week = input.nextInt();
		return week ;
	}
	
}

class person{
	int no;
	String name;
	String sex;
	int age;
}


class doctor extends person{
	Demo d = new Demo();
	int week_time;
	String department;
	//构造函数
	doctor(String name,int week,int no,String dep){
		this.name = name;
		this.week_time = week;
		this.no = no;
		this.department = dep;
	}
	
	void set_tra_time(String dep){
		hello();
		String depart1 = dep ;
		department depart = new department (depart1);
		int week = depart.set_tra_time();
		this.week_time = week;
		System.out.println("修改成功！当前信息如下：");
		libout();
		Demo.main_menu();
	}
	
	void hello(){
		System.out.println("下午好，"+this.name+"！");
	}
	
	void libout(){
		System.out.println("姓名："+this.name+"  科室："+this.department+"  坐诊日期："+this.week_time);
	}

	
}

class patient extends person{
	Demo d = new Demo();
	String exa_department;
	int exa_time;
	//构造函数
	patient(int no,String name,String sex,int age){
		this.name = name;
		this.sex = sex;
		this.age = age;
		this.no = no;
	}
	void set_exa_time(String dep){
		hello();
		set_dep();
		d.list_libout(this.exa_department);
		String depart1 = dep ;
		department depart = new department (depart1);
		this.exa_time = depart.set_exa_time();
		System.out.println("预约成功！当前信息如下：");
		libout();
		Demo.main_menu();
	}
	void hello(){
		System.out.println("下午好，"+this.name+"！");
	}
	
	void libout(){
		System.out.println("姓名："+this.name+"  科室："+this.exa_department+"  预约日期："+this.exa_time);
	}
	void set_dep(){
		System.out.print("请输入科室：内科/外科：");
		Scanner input = new Scanner (System.in);
		this.exa_department = input.next();
	}
}
