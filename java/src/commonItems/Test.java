package commonItems;

import java.io.File;
import java.util.Arrays;

public class Test {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		File dir = new File(args[0]);
		if (!dir.isDirectory()) {
			System.out.println("args[0] is not a directory");
			return;
		}
		File[] allFiles = dir.listFiles();
		for (File f: Arrays.copyOfRange(allFiles, allFiles.length - 1, allFiles.length)) {
			System.out.println(f);
	
		}
	}

}
