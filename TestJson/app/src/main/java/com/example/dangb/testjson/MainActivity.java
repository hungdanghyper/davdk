package com.example.dangb.testjson;

import android.graphics.Color;
import android.graphics.PorterDuff;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import java.io.IOException;
import java.util.ArrayList;
import java.util.List;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONException;
import org.json.JSONObject;

import android.app.Activity;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;
import android.widget.ToggleButton;

import static android.widget.Toast.LENGTH_LONG;

public class MainActivity extends Activity {

    ToggleButton D01;
    ToggleButton D02;
    ToggleButton D03;
    ToggleButton D04;
    String URL_UPDATE = "https://davdk.herokuapp.com/";
    String acc_user = "D01=1";
    String acc_user2 = "D01=0";
    ServiceHandling sh = new ServiceHandling();
    List<NameValuePair> args = new ArrayList<NameValuePair>();
    public TextView findTextView(int id)
    {
        return (TextView) findViewById(id);
    }
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        addControlAndEvents();
        D01.setOnClickListener(new OnClickListener() {
            @Override
            public void onClick(View arg0) {
                if(D01.isChecked()){
                    //args.clear();
                    //args.add(new BasicNameValuePair("D01", ""));
                    args.add(new BasicNameValuePair("D01", acc_user));
                    String json = sh.call(URL_UPDATE, ServiceHandling.GET,args);
                    Toast.makeText(MainActivity.this,"ON",Toast.LENGTH_LONG).show();
                }
                else{
                   // args.clear();
                    args.add(new BasicNameValuePair("D01", ""));
                    args.add(new BasicNameValuePair("D01", acc_user2));
                    String json = sh.call(URL_UPDATE, ServiceHandling.GET, args);
                    Toast.makeText(MainActivity.this,"OFF",Toast.LENGTH_LONG).show();
                }
            }
        });
    }
    private void addControlAndEvents() {
        D01=findViewById(R.id.D01);
        D02=findViewById(R.id.D02);
        D03=findViewById(R.id.D03);
        D04 =findViewById(R.id.D04);
    }
    @Override
    protected void onResume() {
// TODO Auto-generated method stub
        super.onResume();
        new MyJsonTask().execute("https://davdk.herokuapp.com/device.json");
    }
    //Lớp xử lý đa tiến trình:
    public class MyJsonTask extends AsyncTask<String, JSONObject, Void>
    {
        @Override
        protected void onPreExecute() {
// TODO Auto-generated method stub
            super.onPreExecute();
        }
        @Override
        protected Void doInBackground(String... params) {
//Lấy URL truyền vào
            String url=params[0];
            JSONObject jsonObj;
            try {
//đọc và chuyển về JSONObject
                jsonObj = MyJsonReader.readJsonFromUrl(url);
                publishProgress(jsonObj);
            } catch (IOException e) {
                e.printStackTrace();
            } catch (JSONException e) {
                e.printStackTrace();
            }
            return null;
        }
        @Override
        protected void onProgressUpdate(JSONObject... values) {
            super.onProgressUpdate(values);
//ta cập nhật giao diện ở đây:
            JSONObject jsonObj=values[0];
            try {
//kiểm tra xem có tồn tại thuộc tính id hay không
                if(jsonObj.has("D01")){
                    if (Integer.parseInt(jsonObj.getString("D01")) == 0) {
                        D01.setText("Đã Tắt");
                        //D01.getBackground().setColorFilter(Color.parseColor("#FFFFFF"), PorterDuff.Mode.DARKEN);
                    }
                    else{
                        D01.setText("Đã Bật ");
                        D01.getBackground().setColorFilter(Color.parseColor("#00ff00"), PorterDuff.Mode.DARKEN);
                    }
                }
                if(jsonObj.has("D02")) {
                    if (Integer.parseInt(jsonObj.getString("D02")) == 0)
                        D02.setText("Đã Tắt");
                    else {
                        D02.setText("Đã Bật");
                    }
                }
                if(jsonObj.has("D03"))
                {
                    if (Integer.parseInt(jsonObj.getString("D03")) == 0)
                        D04.setText("Đã Tắt");
                    else {
                        D04.setText("Đã Bật");
                    }
                }
                if(jsonObj.has("D04"))
                {
                    if (Integer.parseInt(jsonObj.getString("D04")) == 0)
                        D03.setText("Đã Tắt");
                    else {
                        D03.setText("Đã Bật");
                    }
                }

            } catch (JSONException e) {
                Toast.makeText(MainActivity.this, e.toString(),
                        LENGTH_LONG).show();
                e.printStackTrace();
            }
        }
        @Override
        protected void onPostExecute(Void result) {
            super.onPostExecute(result);
        }
    }
    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
// Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
// Handle action bar item clicks here. The action bar will
// automatically handle clicks on the Home/Up button, so long
// as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();
       /* if (id == R.id.action_settings) {
            return true;
        }*/
        return super.onOptionsItemSelected(item);
    }
}
