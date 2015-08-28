package commonItems;

import java.io.BufferedReader;
import java.io.File;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLConnection;

public class CommonItemRequest extends Thread {
	File[] copyOfRange;
	
	public CommonItemRequest(File[] copyOfRange) {
		this.copyOfRange = copyOfRange;
	}
	
	@Override
	public void run() {
		for (File f: this.copyOfRange) {
			URL url;
			try {
				url = new URL(
						"http://localhost/apichallenge/calculateCommonItems.php?match=file:///"
								+ f.getAbsolutePath());
			} catch (MalformedURLException e) {
				System.out.println("MalformedURLException");
				return;
			}
			try {
				URLConnection con = url.openConnection();
				BufferedReader in = new BufferedReader(new InputStreamReader(
						con.getInputStream()));
				String inputLine;

				String result = "";
				while ((inputLine = in.readLine()) != null) {
					result += inputLine;
				}
				in.close();
				if (!result.equals("")) {
					System.out.println(result);
					System.exit(1);
				}
			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
			CalculateCommonItems.finished(1);
		}
		
	}

}
