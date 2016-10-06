class myThreadd implements Runnable
	{
		public void run()
			{
			for(int i = 1; i <= 5; i++)
				{
					try
						{
							Thread.sleep(500);
						}
					catch (Exception e)
						{
							System.out.println(e);
						}
					System.out.println("i= " +i);
				}
			}
		public static void main(String args[])
		{
			myThreadd t1=new myThreadd();
			Thread t=new Thread(t1);
			t.start();
			myThreadd t2=new myThreadd();
			Thread tt=new Thread(t2);
			tt.start();
			
		}
	}
