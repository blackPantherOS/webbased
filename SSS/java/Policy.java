
// Project: webCDwriter - Network CD Writing
//
//	Command line program to configure the local Java 2 Security Policy
//	for webCDcreator
//
// Author: Jörg Haeger, 24.11.2000
//	Joerg.Haeger@Uni-Bielefeld.de

import java.io.*;

class Policy
{
	public static void main(String args[])
	{
		if (!new File("jhaeger.x509").exists())
		{
			System.out.println(
			"Please copy the certificate jhaeger.x509 from "
			+ "the webpage to this directory!");
			return;
		}

		if (!new File("java.policy").exists())
		{
			System.out.println(
			"Please copy the file java.policy from the webpage "
			+ "to this directory!");
			return;
		}

		String
			slash = System.getProperty("file.separator"),
			userHome = System.getProperty("user.home"),
			javaHome = System.getProperty("java.home"),
			keystore = userHome + slash + ".keystore",
			policy = userHome + slash + ".java.policy";

		System.out.println(
			"This program will configure your "
			+ "Java 2 Security Policy for webCDcreator.\n"
			+ "The files\n"
			+ keystore + "\n"
			+ policy);
		System.out.print("will be created/modified. Continue? [n] ");
		try {
			int c = System.in.read();
			if (c != 'y')
			{
				System.out.println("Cancelled");
				return;
			}
		} catch (Exception e)
		{
			System.out.println("Error: " + e);
			return;
		}

		// append java.policy to userHome/.java.policy
		try {
			// look for a keystore definition in policy
			boolean hasKeystore = false;
			if (new File(policy).exists())
			{
				BufferedReader in = new BufferedReader(
					new FileReader(policy));
				while (!hasKeystore)
				{
					String line = in.readLine();
					if (line == null)
						break;
					hasKeystore = line.trim()
						.startsWith("keystore ");
				}
				in.close();
			}

			BufferedReader in = new BufferedReader(
				new FileReader("java.policy"));

			PrintWriter out = new PrintWriter(
				new FileWriter(policy, true));
			if (!hasKeystore)
				out.println("keystore \".keystore\";");
			out.println("");

			while (true)
			{
				String line = in.readLine();
				if (line == null)
					break;
				out.println(line);
			}
			out.close();
		} catch (Exception e)
		{
			System.out.println("Error: " + e);
			return;
		}

		System.out.println("");
		System.out.println(
			"The contents of the file \"java.policy\"\n"
			+ "\twas added to \"" + policy + "\".");

		System.out.println("");
		System.out.println("To do");
		System.out.println("");
		System.out.println("1. Import the certificate jhaeger.x509 by");
		System.out.println(
			javaHome + slash + "bin" + slash
			+ "keytool -import -alias jhaeger -file jhaeger.x509");

		System.out.println("");
		System.out.println("2. Check your new policy (optional) by");
		System.out.println(javaHome + slash + "bin" + slash
			+ "policytool");
	}
}
