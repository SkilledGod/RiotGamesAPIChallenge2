package commonItems;

import java.io.File;
import java.util.Arrays;

public class CalculateCommonItems {
	public static int numberOfFinishedFiles = 0;
	public static int NUMBER_THREADS = 200;
	public static void main(String[] args) {
		try {
		// get all files
		File dir = new File(args[0]);
		
		if (!dir.isDirectory()) {
			System.out.println("args[0] is not a directory");
			return;
		}
		File[] allFiles = dir.listFiles();
		System.out.println("Games: " + allFiles.length);
		System.out.println("Games per Thread " + (int) Math.ceil(allFiles.length / (double) NUMBER_THREADS));
		for (int i = 0; i < allFiles.length; ) { // 500 Threads
			CommonItemRequest cir = new CommonItemRequest(Arrays.copyOfRange(allFiles, i, Math.min(allFiles.length, i + allFiles.length / NUMBER_THREADS + 1)));
			cir.start();
			i += (int) Math.ceil(allFiles.length / (double) NUMBER_THREADS);
		}
		
		} catch(Exception e) {
			e.printStackTrace();
		}
	}
	
	public synchronized static void finished(int number) {
		CalculateCommonItems.numberOfFinishedFiles += number;
		System.out.println("Finished Games: " + CalculateCommonItems.numberOfFinishedFiles);
	}
}
