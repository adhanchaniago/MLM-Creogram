<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Member;
use App\GoldMember;
use App\CompanyMember;
use App\SerialNumber;
use App\ClientTransaction;
use App\IncomeChartFilter;
use Prophecy\Exception\Doubler\ReturnByReferenceException;

//pagination of collection data
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

use function PHPSTORM_META\map;

class MemberController extends Controller
{

    public function manualAdminPanel(Request $request) {
        if(!session()->has('data')){
            return redirect('login');
        }

        if(session('data')['role'] != 'admin'){
            return redirect('/');
        }

        if($request->batch == ''){
            return redirect('/admin-manual?batch=1');
        }
        
        $check_batch = Member::where('batch', $request->batch)->get();

        if ($check_batch->count() == 0){
            return redirect('/admin-manual?batch=1');
        }

        $batch_head = Member::where('batch', $request->batch)
            ->where('parent_node','head')
            ->get();

        if($request->child == ''){
            $head_member = Member::where('batch', $request->batch)
                ->where('parent_node','head')
                ->get();
        }else if($request->batch == $batch_head[0]->batch  && $request->child == $batch_head[0]->id){
            return redirect('/admin-manual?batch='.$batch_head[0]->batch);
        }else{
            function checkChildNodesMA($givenNode, $childNode, $switch){
                $arrNode = []; 
    
                foreach($givenNode as $id){
                    $parentNode =  Member::findOrFail($id);
                    
                    if ($parentNode->left_node != ''){
                        array_push($arrNode, intval($parentNode->left_node));
                        if ($childNode == $parentNode->left_node){
                            if ($switch == 0){
                                return 'false';
                            } else {
                                return 'true';
                            }
                        }
                    }
    
                    if ($parentNode->right_node != ''){
                        array_push($arrNode, intval($parentNode->right_node));
                        if ($childNode == $parentNode->right_node){
                            if ($switch == 0){
                                return 'false';
                            } else {
                                return 'true';
                            }
                        }
                    }
                }
    
                if (count($arrNode) != 0){
                    if ($switch == 0){
                        return checkChildNodesMA($arrNode, $childNode, 1);
                    } else {
                        return checkChildNodesMA($arrNode, $childNode, 0);
                    }
                }
    
                return 'false';
            }
    
            $node_list = checkChildNodesMA([$batch_head[0]->id], $request->child, 0);
            
            if ($node_list == 'true'){
                $head_member = Member::where('batch', $request->batch)
                    ->where('id', $request->child)
                    ->get();
            }else{
                return redirect('/admin-manual?batch='.$batch_head[0]->batch);
            }
        }

        $members[0] = $head_member[0]; 

        if($members[0]->left_node != ''){
            $members[1] = Member::findOrFail($members[0]->left_node);
        } else {
            $members[1] = array(
                "id" => 0
            );
        }
        
        if($members[0]->right_node != ''){
            $members[2] = Member::findOrFail($members[0]->right_node);
        } else {
            $members[2] = array(
                "id" => 0
            );
        }

        if ($members[1]['id'] == 0){
            $members[3] = array(
                "id" => 0
            );

            $members[4] = array(
                "id" => 0
            );
        } else {
            if($members[1]->left_node != ''){
                $members[3] = Member::findOrFail($members[1]->left_node);
            } else {
                $members[3] = array(
                    "id" => 0
                );
            }
            
            if($members[1]->right_node != ''){
                $members[4] = Member::findOrFail($members[1]->right_node);
            } else {
                $members[4] = array(
                    "id" => 0
                );
            }
        }

        if ($members[2]['id'] == 0){
            $members[5] = array(
                "id" => 0
            );

            $members[6] = array(
                "id" => 0
            );
        } else {
            if($members[2]->left_node != ''){
                $members[5] = Member::findOrFail($members[2]->left_node);
            } else {
                $members[5] = array(
                    "id" => 0
                );
            }
            
            if($members[2]->right_node != ''){
                $members[6] = Member::findOrFail($members[2]->right_node);
            } else {
                $members[6] = array(
                    "id" => 0
                );
            }
        }

        if ($head_member[0]->parent_node != 'head'){
            $parent_node = Member::findOrFail($head_member[0]->parent_node);
            $head_node = Member::findOrFail($parent_node->parent_node);
            $goback =  $head_node->id;
        } else {
            $goback = 0;
        }

        $batch = DB::table('members')->select('batch')->distinct()->get();
        $batch = collect($batch)->sortBy('batch');
        $batch_no = $request->batch;

        return view('manualAdminPanel',compact(
            'members',
            'goback',
            'batch',
            'batch_no'
        ));
    }

    public function universalAdminPanel(Request $request) {
        if(!session()->has('data')){
            return redirect('login');
        }

        if(session('data')['role'] != 'admin'){
            return redirect('/');
        }

        if($request->child == ''){
            $head_member = GoldMember::where('parent_node', 'head')->get();
        }else if($request->child == '1'){
            return redirect('/admin-universal');
        }else{
            function checkChildNodesUA($givenNode, $childNode, $switch){
                $arrNode = []; 
    
                foreach($givenNode as $id){
                    $parentNode =  GoldMember::findOrFail($id);
                    
                    if ($parentNode->left_node != ''){
                        array_push($arrNode, intval($parentNode->left_node));
                        if ($childNode == $parentNode->left_node){
                            if ($switch == 0){
                                return 'false';
                            } else {
                                return 'true';
                            }
                        }
                    }
    
                    if ($parentNode->right_node != ''){
                        array_push($arrNode, intval($parentNode->right_node));
                        if ($childNode == $parentNode->right_node){
                            if ($switch == 0){
                                return 'false';
                            } else {
                                return 'true';
                            }
                        }
                    }
                }
    
                if (count($arrNode) != 0){
                    if ($switch == 0){
                        return checkChildNodesUA($arrNode, $childNode, 1);
                    } else {
                        return checkChildNodesUA($arrNode, $childNode, 0);
                    }
                }
    
                return 'false';
            }
    
            $node_list = checkChildNodesUA(['1'], $request->child, 0);
            
            if ($node_list == 'true'){
                $head_member = GoldMember::where('id', $request->child)->get();
            }else{
                return redirect('/admin-universal');
            }
        }

        $members[0] = $head_member[0]; 

        if($members[0]->left_node != ''){
            $members[1] = GoldMember::findOrFail($members[0]->left_node);
        } else {
            $members[1] = array(
                "id" => 0
            );
        }
        
        if($members[0]->right_node != ''){
            $members[2] = GoldMember::findOrFail($members[0]->right_node);
        } else {
            $members[2] = array(
                "id" => 0
            );
        }

        if ($members[1]['id'] == 0){
            $members[3] = array(
                "id" => 0
            );

            $members[4] = array(
                "id" => 0
            );
        } else {
            if($members[1]->left_node != ''){
                $members[3] = GoldMember::findOrFail($members[1]->left_node);
            } else {
                $members[3] = array(
                    "id" => 0
                );
            }
            
            if($members[1]->right_node != ''){
                $members[4] = GoldMember::findOrFail($members[1]->right_node);
            } else {
                $members[4] = array(
                    "id" => 0
                );
            }
        }

        if ($members[2]['id'] == 0){
            $members[5] = array(
                "id" => 0
            );

            $members[6] = array(
                "id" => 0
            );
        } else {
            if($members[2]->left_node != ''){
                $members[5] = GoldMember::findOrFail($members[2]->left_node);
            } else {
                $members[5] = array(
                    "id" => 0
                );
            }
            
            if($members[2]->right_node != ''){
                $members[6] = GoldMember::findOrFail($members[2]->right_node);
            } else {
                $members[6] = array(
                    "id" => 0
                );
            }
        }

        if ($head_member[0]->parent_node != 'head'){
            $parent_node = GoldMember::findOrFail($head_member[0]->parent_node);
            $head_node = GoldMember::findOrFail($parent_node->parent_node);
            $goback =  $head_node->id;
        } else {
            $goback = 0;
        }

        return view('universalAdminPanel',compact(
            'members',
            'goback'
        ));
    }

    public function manualClientPanel(Request $request) {
        if(!session()->has('data')){
            return redirect('login');
        }

        if(session('data')['role'] == 'admin'){
            return redirect('/');
        }

        if($request->child == ''){
            $head_member = Member::where('id', session('data')['id'])->get();
        }else if($request->child == session('data')['id']){
            return redirect('/client-manual');
        }else{
            function checkChildNodesMC($givenNode, $childNode, $switch){
                $arrNode = []; 
    
                foreach($givenNode as $id){
                    $parentNode =  Member::findOrFail($id);
                    
                    if ($parentNode->left_node != ''){
                        array_push($arrNode, intval($parentNode->left_node));
                        if ($childNode == $parentNode->left_node){
                            if ($switch == 0){
                                return 'false';
                            } else {
                                return 'true';
                            }
                        }
                    }
    
                    if ($parentNode->right_node != ''){
                        array_push($arrNode, intval($parentNode->right_node));
                        if ($childNode == $parentNode->right_node){
                            if ($switch == 0){
                                return 'false';
                            } else {
                                return 'true';
                            }
                        }
                    }
                }
    
                if (count($arrNode) != 0){
                    if ($switch == 0){
                        return checkChildNodesMC($arrNode, $childNode, 1);
                    } else {
                        return checkChildNodesMC($arrNode, $childNode, 0);
                    }
                }
    
                return 'false';
            }
    
            $node_list = checkChildNodesMC([session('data')['id']], $request->child, 0);
            
            if ($node_list == 'true'){
                $head_member = Member::where('id', $request->child)->get();
            }else{
                return redirect('/client-manual');
            }
        }
        
        $members[0] = $head_member[0]; 

        if($members[0]->left_node != ''){
            $members[1] = Member::findOrFail($members[0]->left_node);
        } else {
            $members[1] = array(
                "id" => 0
            );
        }
    
        if($members[0]->right_node != ''){
            $members[2] = Member::findOrFail($members[0]->right_node);
        } else {
            $members[2] = array(
                "id" => 0
            );
        }

        if ($members[1]['id'] == 0){
            $members[3] = array(
                "id" => 0
            );

            $members[4] = array(
                "id" => 0
            );
        } else {
            if($members[1]->left_node != ''){
                $members[3] = Member::findOrFail($members[1]->left_node);
            } else {
                $members[3] = array(
                    "id" => 0
                );
            }
            
            if($members[1]->right_node != ''){
                $members[4] = Member::findOrFail($members[1]->right_node);
            } else {
                $members[4] = array(
                    "id" => 0
                );
            }
        }

        if ($members[2]['id'] == 0){
            $members[5] = array(
                "id" => 0
            );

            $members[6] = array(
                "id" => 0
            );
        } else {
            if($members[2]->left_node != ''){
                $members[5] = Member::findOrFail($members[2]->left_node);
            } else {
                $members[5] = array(
                    "id" => 0
                );
            }
            
            if($members[2]->right_node != ''){
                $members[6] = Member::findOrFail($members[2]->right_node);
            } else {
                $members[6] = array(
                    "id" => 0
                );
            }
        }

        if ($head_member[0]->id != session('data')['id']){
            $parent_node = Member::findOrFail($head_member[0]->parent_node);
            $head_node = Member::findOrFail($parent_node->parent_node);
            $goback =  $head_node->id;
        } else {
            $goback = 0;
        }

        return view('manualClientPanel',compact('members','goback'));
    }

    public function paginate($items, $perPage = 10, $page = null, $options = []){
        //paginate collection or json file
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function universalClientPanel(Request $request) {
        if(!session()->has('data')){
            return redirect('login');
        }

        if(session('data')['role'] == 'admin'){
            return redirect('/');
        }

        $head = GoldMember::where('email', session('data')['email'])->get();

        if($request->child == ''){
            $head_member = GoldMember::where('email', session('data')['email'])->get();
        }else if($request->child == $head[0]->id){
            return redirect('/client-universal');
        }else{
            function checkChildNodesUC($givenNode, $childNode, $switch){
                $arrNode = []; 
    
                foreach($givenNode as $id){
                    $parentNode =  GoldMember::findOrFail($id);
                    
                    if ($parentNode->left_node != ''){
                        array_push($arrNode, intval($parentNode->left_node));
                        if ($childNode == $parentNode->left_node){
                            if ($switch == 0){
                                return 'false';
                            } else {
                                return 'true';
                            }
                        }
                    }
    
                    if ($parentNode->right_node != ''){
                        array_push($arrNode, intval($parentNode->right_node));
                        if ($childNode == $parentNode->right_node){
                            if ($switch == 0){
                                return 'false';
                            } else {
                                return 'true';
                            }
                        }
                    }
                }
    
                if (count($arrNode) != 0){
                    if ($switch == 0){
                        return checkChildNodesUC($arrNode, $childNode, 1);
                    } else {
                        return checkChildNodesUC($arrNode, $childNode, 0);
                    }
                }
    
                return 'false';
            }
    
            $node_list = checkChildNodesUC([$head[0]->id], $request->child, 0);
            
            if ($node_list == 'true'){
                $head_member = GoldMember::where('id', $request->child)->get();
            }else{
                return redirect('/client-universal');
            }
        }

        $members[0] = $head_member[0]; 

        if($members[0]->left_node != ''){
            $members[1] = GoldMember::findOrFail($members[0]->left_node);
        } else {
            $members[1] = array(
                "id" => 0
            );
        }
        
        if($members[0]->right_node != ''){
            $members[2] = GoldMember::findOrFail($members[0]->right_node);
        } else {
            $members[2] = array(
                "id" => 0
            );
        }

        if ($members[1]['id'] == 0){
            $members[3] = array(
                "id" => 0
            );

            $members[4] = array(
                "id" => 0
            );
        } else {
            if($members[1]->left_node != ''){
                $members[3] = GoldMember::findOrFail($members[1]->left_node);
            } else {
                $members[3] = array(
                    "id" => 0
                );
            }
            
            if($members[1]->right_node != ''){
                $members[4] = GoldMember::findOrFail($members[1]->right_node);
            } else {
                $members[4] = array(
                    "id" => 0
                );
            }
        }

        if ($members[2]['id'] == 0){
            $members[5] = array(
                "id" => 0
            );

            $members[6] = array(
                "id" => 0
            );
        } else {
            if($members[2]->left_node != ''){
                $members[5] = GoldMember::findOrFail($members[2]->left_node);
            } else {
                $members[5] = array(
                    "id" => 0
                );
            }
            
            if($members[2]->right_node != ''){
                $members[6] = GoldMember::findOrFail($members[2]->right_node);
            } else {
                $members[6] = array(
                    "id" => 0
                );
            }
        }

        if ($head_member[0]->email != session('data')['email']){
            $parent_node = GoldMember::findOrFail($head_member[0]->parent_node);
            $head_node = GoldMember::findOrFail($parent_node->parent_node);
            $goback =  $head_node->id;
        } else {
            $goback = 0;
        }

        return view('universalClientPanel',compact(
            'members',
            'goback'
        ));
    }

    public function dashboardClientPanel() {
        if(!session()->has('data')){
            return redirect('login');
        }

        if(session('data')['role'] == 'admin'){
            return redirect('/');
        }
        
        function countManual($givenNode, $length){
            $arrNode = []; 
            $length += count($givenNode);   

            foreach($givenNode as $id){
                $parentNode =  Member::findOrFail($id);
                
                if ($parentNode->left_node != ''){
                    array_push($arrNode, intval($parentNode->left_node));
                }

                if ($parentNode->right_node != ''){
                    array_push($arrNode, intval($parentNode->right_node));
                }
            }

            if (count($arrNode) != 0){
                $length += countManual($arrNode, 0);
            }

            return $length;  
        }

        function countUniversal($givenNode, $length){
            $arrNode = []; 
            $length += count($givenNode);   

            foreach($givenNode as $id){
                $parentNode =  GoldMember::findOrFail($id);
                
                if ($parentNode->left_node != ''){
                    array_push($arrNode, intval($parentNode->left_node));
                }

                if ($parentNode->right_node != ''){
                    array_push($arrNode, intval($parentNode->right_node));
                }
            }

            if (count($arrNode) != 0){
                $length += countManual($arrNode, 0);
            }

            return $length;  
        }

        $client_transaction = ClientTransaction::where('email',session('data')['email'])
            ->where('transaction_type','withdraw')
            ->get();
        $total_withdrawal_transactions = 0;
        
        foreach($client_transaction as $transaction){
            $total_withdrawal_transactions += $transaction->amount;
        }

        $chartfilter = IncomeChartFilter::all();

        $current_to_date = date('Y-m-d', strtotime($chartfilter[4]->to));
        $date_today = date("Y-m-d");
        // $date_today = date("Y-m-d", strtotime("2020-09-02"));
        $days = 0;

        if( $date_today > $current_to_date ){
            while( $date_today > $current_to_date ){
                $days += 7;
                $current_to_date = date('Y-m-d', strtotime($current_to_date. ' + 7 days'));
            }

            foreach($chartfilter as $filter){
                $filter->from = date('Y-m-d', strtotime($filter->from. ' + '.$days.' days'));
                $filter->to = date('Y-m-d', strtotime($filter->to. ' + '.$days.' days'));
                $filter->save();
            }
        }

        $filter1_name = date('F j', strtotime($chartfilter[0]->from)) .' to '.date('F j', strtotime($chartfilter[0]->to));
        $filter2_name = date('F j', strtotime($chartfilter[1]->from)) .' to '.date('F j', strtotime($chartfilter[1]->to));
        $filter3_name = date('F j', strtotime($chartfilter[2]->from)) .' to '.date('F j', strtotime($chartfilter[2]->to));
        $filter4_name = date('F j', strtotime($chartfilter[3]->from)) .' to '.date('F j', strtotime($chartfilter[3]->to));
        $filter5_name = date('F j', strtotime($chartfilter[4]->from)) .' to '.date('F j', strtotime($chartfilter[4]->to));

        function countWeeklyIncome($filter){
            $total_week_income = 0;
            foreach($filter as $week){
                $total_week_income += $week->amount;
            }

            return $total_week_income;
        }

        $filter1 = ClientTransaction::where('email',session('data')['email'])->where('transaction_type','income')->whereBetween('created_at', [$chartfilter[0]->from, $chartfilter[0]->to])->get();
        $filter2 = ClientTransaction::where('email',session('data')['email'])->where('transaction_type','income')->whereBetween('created_at', [$chartfilter[1]->from, $chartfilter[1]->to])->get();
        $filter3 = ClientTransaction::where('email',session('data')['email'])->where('transaction_type','income')->whereBetween('created_at', [$chartfilter[2]->from, $chartfilter[2]->to])->get();
        $filter4 = ClientTransaction::where('email',session('data')['email'])->where('transaction_type','income')->whereBetween('created_at', [$chartfilter[3]->from, $chartfilter[3]->to])->get();
        $filter5 = ClientTransaction::where('email',session('data')['email'])->where('transaction_type','income')->whereBetween('created_at', [$chartfilter[4]->from, $chartfilter[4]->to])->get();

        $filter1_income = countWeeklyIncome($filter1);
        $filter2_income = countWeeklyIncome($filter2);
        $filter3_income = countWeeklyIncome($filter3);
        $filter4_income = countWeeklyIncome($filter4);
        $filter5_income = countWeeklyIncome($filter5);

        $title = "Client Dashboard";
        $member = Member::where('email',session('data')['email'])->get('income');
        $goldmember = GoldMember::where('email',session('data')['email'])->get('income');
        $total_income = $member[0]->income + $goldmember[0]->income;
        $total_member = countManual([session('data')['id']], 0 ) - 1;
        $total_goldmember = countUniversal([session('data')['id']], 0 ) - 1;
        $total_referred_members = count(Member::where('referred_by',session('data')['email'])->get());
        $total_balance = $total_income - $total_withdrawal_transactions;
        

        return view('dashboardClientPanel',compact(
            'title',
            'total_income',
            'total_member',
            'total_goldmember',
            'total_referred_members',
            'total_balance',
            'filter1_income',
            'filter1_name',
            'filter2_income',
            'filter2_name',
            'filter3_income',
            'filter3_name',
            'filter4_income',
            'filter4_name',
            'filter5_income',
            'filter5_name',
        ));
    }

    public function withdrawForm(){
        if(!session()->has('data')){
            return redirect('login');
        }

        if(session('data')['role'] == 'admin'){
            return redirect('/');
        }

        $client_transaction = ClientTransaction::where('email',session('data')['email'])
            ->where('transaction_type','withdraw')
            ->get();

        $total_withdrawal_transactions = 0;

        foreach($client_transaction as $transaction){
            $total_withdrawal_transactions += $transaction->amount;
        }

        $member = Member::where('email',session('data')['email'])->get('income');
        $goldmember = GoldMember::where('email',session('data')['email'])->get('income');
        $total_income = $member[0]->income + $goldmember[0]->income;
        $total_balance = $total_income - $total_withdrawal_transactions;

        $title = "Transaction Form";

        return view('withdrawClientPanel',compact('title','total_balance'));
    }

    public function withdrawTransaction(Request $request){
        $this->validate($request, [
            'email' => "required",
            'password' => "required",
            'amount' => "required"
        ]);

        if($request->total_balance >= $request->amount){
            if(session('data')['email'] == $request->get('email') && session('data')['password'] == $request->get('password')){
                $transaction = new ClientTransaction([
                    'email' => $request->get('email'),
                    'transaction_type' => 'withdraw',
                    'amount' => intval($request->get('amount')),
                ]);
        
                $transaction->save();

                return redirect()->route('withdrawform')->with('success','Transaction Complete');
            }else{
                return redirect()->route('withdrawform')->with('error','Invalid Email or Password');
            }
        }else{
            return redirect()->route('withdrawform')->with('error','Invalid Amount');
        }
    }

    public function addmember(Request $request){
        if(!session()->has('data')){
            return redirect('login');
        }

        $check_code = SerialNumber::where('input_code',$request->get('code'))->get();

        if ( $check_code->count() == 0 ){
            return redirect('/use-refcode/member')->with('error','Invalid Serial Number');
        }


        if($check_code[0]->status == '1'){
            return redirect('/use-refcode/member')->with('error','This code has already been used');
        }else {
            $input_code = $request->code;
        }
        
        $title = "Add Member";
        return view('addmember',compact('title','input_code'));
    }

    public function store(Request $request){

        $this->validate($request, [
            'full_name' => "required",
            'email' => "required",
            'contact_number' => "required",
            'referred_by' => "required",
            'node' => "required"
        ]);

        $check_code = SerialNumber::where('input_code',$request->get('input_code'))->get();

        if($check_code[0]->status == '1'){
            return redirect('/use-refcode/member')->with('error','This code has already been used');
        }

        $check_email = count(Member::where('email',$request->get('email'))->get());
        $check_email_admin = count(CompanyMember::where('email',$request->get('email'))->get());

        if ($check_email != 0 || $check_email_admin != 0){ //isnotempty
            return redirect('/member/add?code='.$request->get('input_code'))->with('error','An account with Email '.$request->get('email').' is already exist');
        }

        //FOR MANUAL SORT
        $parent_node = Member::where('email',$request->get('referred_by'))->get();
        
        if (count($parent_node) == 0){
            return redirect('/member/add?code='.$request->get('input_code'))->with('error','Invalid Referral Name');
        }else{
            $batch = $parent_node[0]->batch;
        }

        function addMember($givenNode, $request){
            $arrNode = [];

            foreach ($givenNode as & $id) {
                $parentNode =  Member::findOrFail($id);

                if ($parentNode->left_node == '' ){
                    $left_node = new Member([
                        'full_name' => $request->get('full_name'),
                        'email' => $request->get('email'),
                        'password' => '123123123',
                        'contact_number' => $request->get('contact_number'),
                        'serial_number' => $request->get('input_code'),
                        'referred_by' => $request->get('referred_by'),
                        'income' => 0,
                        'batch' => $parentNode->batch,
                        'parent_node' => $parentNode->id,
                        'left_node' => '',
                        'right_node' => ''
                    ]);
            
                    $left_node->save();

                    $left_node = Member::where('email',$request->get('email'))->get();
                    
                    $parentNode->left_node = $left_node[0]->id;
                    $parentNode->save();
                    addIncome($parentNode->id); // for income

                    return;

                } else if($parentNode->right_node == '' ){
                    $right_node = new Member([
                        'full_name' => $request->get('full_name'),
                        'email' => $request->get('email'),
                        'password' => '123123123',
                        'contact_number' => $request->get('contact_number'),
                        'serial_number' => $request->get('input_code'),
                        'referred_by' => $request->get('referred_by'),
                        'income' => 0,
                        'batch' => $parentNode->batch,
                        'parent_node' => $parentNode->id,
                        'left_node' => '',
                        'right_node' => ''
                    ]);
            
                    $right_node->save();

                    $right_node = Member::where('email',$request->get('email'))->get();
                    
                    $parentNode->right_node = $right_node[0]->id;
                    $parentNode->save();
                    addIncome($parentNode->id); // for income

                    return;
                } else {
                    array_push($arrNode, intval($parentNode->left_node),  intval($parentNode->right_node));
                }
            }

            
            return addMember($arrNode, $request);
        }

        function countNodes($givenNode, $length){
            $arrNode = []; 
            $length += count($givenNode);   

            foreach($givenNode as $id){
                $parentNode =  Member::findOrFail($id);
                
                if ($parentNode->left_node != ''){
                    array_push($arrNode, intval($parentNode->left_node));
                }

                if ($parentNode->right_node != ''){
                    array_push($arrNode, intval($parentNode->right_node));
                }
            }

            if (count($arrNode) != 0){
                $length += countNodes($arrNode, 0);
            }

            return $length;  
        }

        function addIncome($node){
            $income = 0;
            $leftNodeLength = 0;
            $rightNodeLength = 0;
            
            $parent_node = Member::where('id', $node)->get();

            if ($parent_node[0]->left_node != '' && $parent_node[0]->right_node != '' ){ 
                $leftNodeLength = countNodes([$parent_node[0]->left_node], $leftNodeLength);
                $rightNodeLength = countNodes([$parent_node[0]->right_node], $rightNodeLength);
            }

            if($leftNodeLength  < $rightNodeLength){
                $income = 5000 * $leftNodeLength;
            } else if($leftNodeLength  > $rightNodeLength){
                $income = 5000 * $rightNodeLength;
            } else { //kapag pantay
                $income = 5000 * $leftNodeLength;
            }

            if ($parent_node[0]->income < $income ){
                $amount = $income - intval($parent_node[0]->income);

                $transaction = new ClientTransaction([
                    'email' => $parent_node[0]->email,
                    'transaction_type' => 'income',
                    'amount' => $amount,
                ]);
        
                $transaction->save();
            }
            $parent_node[0]->income = $income;
            
            $parent_node[0]->save();

            if($parent_node[0]->parent_node != 'head'){
                addIncome($parent_node[0]->parent_node);
            } else {
                return;
            }
        }

        if($request->get('node') == "right"){
            if ($parent_node[0]->right_node == ''){
                $right_node = new Member([
                    'full_name' => $request->get('full_name'),
                    'email' => $request->get('email'),
                    'password' => '123123123',
                    'contact_number' => $request->get('contact_number'),
                    'serial_number' => $request->get('input_code'),
                    'referred_by' => $request->get('referred_by'),
                    'income' => 0,
                    'batch' => $batch,
                    'parent_node' => $parent_node[0]->id,
                    'left_node' => '',
                    'right_node' => ''
                ]);
        
                $right_node->save();

                $right_node = Member::where('full_name',$request->get('full_name'))->get();

                $parent_node[0]->right_node = $right_node[0]->id;
                $parent_node[0]->save();
                addIncome($parent_node[0]->id);
            }else{
                $parent_node = Member::where('id',$parent_node[0]->right_node)->get();
                addMember([$parent_node[0]->id], $request);
            }
        }else{
            if ($parent_node[0]->left_node == ''){
                $left_node = new Member([
                    'full_name' => $request->get('full_name'),
                    'email' => $request->get('email'),
                    'password' => '123123123',
                    'contact_number' => $request->get('contact_number'),
                    'serial_number' => $request->get('input_code'),
                    'referred_by' => $request->get('referred_by'),
                    'income' => 0,
                    'batch' => $batch,
                    'parent_node' => $parent_node[0]->id,
                    'left_node' => '',
                    'right_node' => ''
                ]);
        
                $left_node->save();

                $left_node = Member::where('full_name',$request->get('full_name'))->get();
                
                $parent_node[0]->left_node = $left_node[0]->id;
                $parent_node[0]->save();
                addIncome($parent_node[0]->id); //add income
            }else{
                $parent_node = Member::where('id',$parent_node[0]->left_node)->get();
                addMember([$parent_node[0]->id], $request);
            }
        }

        //FOR AUTOFILL SORT
        $parent_node = GoldMember::where('parent_node','head')->get();

        function addGoldMember($givenNode, $request){
            $arrNode = [];

            foreach ($givenNode as & $id) {
                $parentNode =  GoldMember::findOrFail($id);

                if ($parentNode->left_node == '' ){
                    $left_node = new GoldMember([
                        'full_name' => $request->get('full_name'),
                        'email' => $request->get('email'),
                        'contact_number' => $request->get('contact_number'),
                        'serial_number' => $request->get('input_code'),
                        'referred_by' => $request->get('referred_by'),
                        'income' => 0,
                        'parent_node' => $parentNode->id,
                        'left_node' => '',
                        'right_node' => '' 
                    ]);
            
                    $left_node->save();

                    $left_node = GoldMember::where('email',$request->get('email'))->get();

                    $parentNode->left_node = $left_node[0]->id;
                    $parentNode->save();
                    
                    addGoldIncome($parentNode->id); //add gold income
                    return;

                } else if($parentNode->right_node == '' ){
                    $right_node = new GoldMember([
                        'full_name' => $request->get('full_name'),
                        'email' => $request->get('email'),
                        'contact_number' => $request->get('contact_number'),
                        'serial_number' => $request->get('input_code'),
                        'referred_by' => $request->get('referred_by'),
                        'income' => 0,
                        'parent_node' => $parentNode->id,
                        'left_node' => '',
                        'right_node' => ''
                    ]);
            
                    $right_node->save();

                    $right_node = GoldMember::where('email',$request->get('email'))->get();

                    $parentNode->right_node = $right_node[0]->id;
                    $parentNode->save();
                    
                    addGoldIncome($parentNode->id); //add gold income
                    return;
                } else {
                    array_push($arrNode, intval($parentNode->left_node),  intval($parentNode->right_node));
                }
            }

           

            
            return addGoldMember($arrNode, $request);
        }
        
        function countGoldNodes($givenNode, $length){
            $arrNode = []; 
            $length += count($givenNode);   

            foreach($givenNode as $id){
                $parentNode =  GoldMember::findOrFail($id);
                
                if ($parentNode->left_node != ''){
                    array_push($arrNode, intval($parentNode->left_node));
                }

                if ($parentNode->right_node != ''){
                    array_push($arrNode, intval($parentNode->right_node));
                }
            }

            if (count($arrNode) != 0){
                $length += countGoldNodes($arrNode, 0);
            }

            return $length;  
        }

        function addGoldIncome($node){
            $income = 0;
            $leftNodeLength = 0;
            $rightNodeLength = 0;
            
            $parent_node = GoldMember::where('id', $node)->get();

            if ($parent_node[0]->left_node != '' && $parent_node[0]->right_node != '' ){ 
                $leftNodeLength = countGoldNodes([$parent_node[0]->left_node], $leftNodeLength);
                $rightNodeLength = countGoldNodes([$parent_node[0]->right_node], $rightNodeLength);
            }

            if($leftNodeLength  < $rightNodeLength){
                $length = ($leftNodeLength - ($leftNodeLength%3))/3;
                $income =  $length * 1000;
            } else if($leftNodeLength  > $rightNodeLength){
                $length = ($rightNodeLength - ($rightNodeLength%3))/3;
                $income =  $length * 1000;
            } else { //kapag pantay
                $length = ($leftNodeLength - ($leftNodeLength%3))/3;
                $income =  $length * 1000;
            }

            if ($parent_node[0]->income < $income ){
                $amount = $income - intval($parent_node[0]->income);

                $transaction = new ClientTransaction([
                    'email' => $parent_node[0]->email,
                    'transaction_type' => 'income',
                    'amount' => $amount,
                ]);
        
                $transaction->save();
            }

            $parent_node[0]->income = $income;
            $parent_node[0]->save();

            if($parent_node[0]->parent_node != 'head'){
                addGoldIncome($parent_node[0]->parent_node);
            } else {
                return;
            }
        }

        addGoldMember([$parent_node[0]->id], $request);

        $serial_number = SerialNumber::where('input_code',$request->get('input_code'))->get();
        $serial_number[0]->status = '1';
        $serial_number[0]->save();

        //return redirect('/form/add')->with('success','Data is Successfully Added');
        return redirect('/use-refcode/member')->with('success','Data is Successfully Added');
    }

    public function addhead(Request $request){
        if(!session()->has('data')){
            return redirect('login');
        }

        $check_code = SerialNumber::where('input_code',$request->get('code'))->get();

        if ( $check_code->count() == 0 ){
            return redirect('/use-refcode/head')->with('error','Invalid Serial Number');
        }

        if($check_code[0]->status == '1'){
            return redirect('/use-refcode/head')->with('error','This code has already been used');
        }else {
            $input_code = $request->code;
        }

        $title = "Add Head";
        return view('addhead',compact('title','input_code'));
    }

    public function storehead(Request $request){

        $this->validate($request, [
            'full_name' => "required",
            'email' => "required",
            'contact_number' => "required"
        ]);

        $check_code = SerialNumber::where('input_code',$request->get('input_code'))->get();

        if($check_code[0]->status == '1'){
            return redirect('/use-refcode/head')->with('error','This code has already been used');
        }

        $check_email = count(Member::where('email',$request->get('email'))->get());
        $check_email_admin = count(CompanyMember::where('email',$request->get('email'))->get());
        if ($check_email != 0 || $check_email_admin != 0){ //isnotempty
            return redirect('/member/add-head?code='.$request->get('input_code'))->with('error','An account with Email '.$request->get('email').' is already exist');
        }

        $batch = DB::table('members')->select('batch')->distinct()->get();
        $batch_no = count($batch) + 1;

        //FOR Manual Binary
        $node = new Member([
            'full_name' => $request->get('full_name'),
            'email' => $request->get('email'),
            'password' => '123123123',
            'contact_number' => $request->get('contact_number'),
            'serial_number' => $request->get('input_code'),
            'referred_by' => '',
            'income' => 0,
            'batch' => $batch_no,
            'parent_node' => 'head',
            'left_node' => '',
            'right_node' => ''
        ]);

        $node->save();

        //FOR Universal Binary
        $parent_node = GoldMember::where('parent_node','head')->get();

        function addGoldHeadMember($givenNode, $request){
            $arrNode = [];

            foreach ($givenNode as &$parentNode) {
                $node =  GoldMember::findOrFail($parentNode);

                if ($node->left_node == '' ){
                    $left_node = new GoldMember([
                        'full_name' => $request->get('full_name'),
                        'email' => $request->get('email'),
                        'contact_number' => $request->get('contact_number'),
                        'serial_number' => $request->get('input_code'),
                        'referred_by' => '',
                        'income' => 0,
                        'parent_node' => $node->id,
                        'left_node' => '',
                        'right_node' => '' 
                    ]);
            
                    $left_node->save();

                    $left_node = GoldMember::where('email',$request->get('email'))->get();

                    $node->left_node = $left_node[0]->id;
                    $node->save();
                    
                    addHeadGoldIncome($node->id);
                    return;

                } else if($node->right_node == '' ){
                    $right_node = new GoldMember([
                        'full_name' => $request->get('full_name'),
                        'email' => $request->get('email'),
                        'contact_number' => $request->get('contact_number'),
                        'serial_number' => $request->get('input_code'),
                        'referred_by' => '',
                        'income' => 0,
                        'parent_node' => $node->id,
                        'left_node' => '',
                        'right_node' => ''
                    ]);
            
                    $right_node->save();

                    $right_node = GoldMember::where('email',$request->get('email'))->get();

                    $node->right_node = $right_node[0]->id;
                    $node->save();
                    
                    addHeadGoldIncome($node->id);
                    return;
                } else {
                    array_push($arrNode, intval($node->left_node),  intval($node->right_node));
                }
            }

            return addGoldHeadMember($arrNode, $request);
        }

        function countHeadGoldNodes($givenNode, $length){
            echo 'countHeadGoldNodes <br />';
            $arrNode = []; 
            $length += count($givenNode);   

            foreach($givenNode as $id){
                $parentNode =  GoldMember::findOrFail($id);
                
                if ($parentNode->left_node != ''){
                    array_push($arrNode, intval($parentNode->left_node));
                }

                if ($parentNode->right_node != ''){
                    array_push($arrNode, intval($parentNode->right_node));
                }
            }

            if (count($arrNode) != 0){
                $length += countHeadGoldNodes($arrNode, 0);
            }

            return $length;  
        }

        function addHeadGoldIncome($node){
            echo 'income<br />';
            $income = 0;
            $leftNodeLength = 0;
            $rightNodeLength = 0;
            
            $parent_node = GoldMember::where('id', $node)->get();

            if ($parent_node[0]->left_node != '' && $parent_node[0]->right_node != '' ){ 
                $leftNodeLength = countHeadGoldNodes([$parent_node[0]->left_node], $leftNodeLength);
                $rightNodeLength = countHeadGoldNodes([$parent_node[0]->right_node], $rightNodeLength);
            }

            if($leftNodeLength  < $rightNodeLength){
                $length = ($leftNodeLength - ($leftNodeLength%3))/3;
                $income =  $length * 1000;
            } else if($leftNodeLength  > $rightNodeLength){
                $length = ($rightNodeLength - ($rightNodeLength%3))/3;
                $income =  $length * 1000;
            } else { //kapag pantay
                $length = ($leftNodeLength - ($leftNodeLength%3))/3;
                $income =  $length * 1000;
            }

            if ($parent_node[0]->income < $income ){
                $amount = $income - intval($parent_node[0]->income);

                $transaction = new ClientTransaction([
                    'email' => $parent_node[0]->email,
                    'transaction_type' => 'income',
                    'amount' => $amount,
                ]);
        
                $transaction->save();
            }

            $parent_node[0]->income = $income;
            $parent_node[0]->save();

            if($parent_node[0]->parent_node != 'head'){
                addHeadGoldIncome($parent_node[0]->parent_node);
            } else {
                return;
            }
        }
        
        addGoldHeadMember([$parent_node[0]->id], $request);

        $serial_number = SerialNumber::where('input_code',$request->get('input_code'))->get();
        $serial_number[0]->status = '1';
        $serial_number[0]->save();
       
        //return redirect('/form/add')->with('success','Data is Successfully Added');
        return redirect('/use-refcode/head')->with('success','Data is Successfully Added');
    }

    public function profile(){
        if(!session()->has('data')){
            return redirect('login');
        }

        $member = Member::findOrFail(session('data')['id']);

        return view('profile',compact('member'));
    }

    public function edit(){
        if(!session()->has('data')){
            return redirect('login');
        }

        $title="Update Profile";
        $member = Member::findOrFail(session('data')['id']);

        return view('updateMember',compact('title','member'));
    }

    public function update(Request $request){
        $this->validate($request, [
            'full_name' => "required",
            'contact_number' => "required"
        ]);

        $account = Member::findOrFail(session('data')['id']);

        $account->full_name = $request->get('full_name');
        $account->contact_number = $request->get('contact_number');
        $account->save();
        
        return redirect()->route('profile')->with('success','Profile changed successfully');
    }

    public function login(Request $request) {
        $request->validate([
            'password' =>'min:9'
        ]);

        $admin = CompanyMember::where('email',$request->get('email'))->get();

        if (count($admin) != 0){
            if( $admin[0]->password == $request->get('password')){
                $request->session()->put('data', $admin[0]);
                return redirect('/admin-manual?batch=1');
            }
        }

        $account = Member::where('email',$request->get('email'))->get();
           
        if (count($account) == 0){
            return redirect()->route('login')->with('error','Invalid Email or Password');
        }else{
            if( $account[0]->password == $request->get('password')){
                $request->session()->put('data', $account[0]);
                return redirect('/client-dashboard');
            } else {
                return redirect()->route('login')->with('error','Invalid Email or Password');
            }
        }

        
    }

    public function logout(Request $request) {
        session()->forget('data');
        return redirect('/login');
    }

    public function editPassword(){
        if(!session()->has('data')){
            return redirect('login');
        }

        $title = "Change Password";
        return view('changePassword',compact('title'));
    }

    public function updatePassword(Request $request){
        $this->validate($request, [
            'current_password' => "required",
            'new_password' => "required",
            'retype_new_password' => "required"
        ]);

        if ( $request->get('current_password') != session('data')['password'] ){
            return redirect()->route('changePassword')->with('error','Your current password is incorrect. It\'s required to change password');
        }

        if ( $request->get('new_password') != $request->get('retype_new_password')){
            return redirect()->route('changePassword')->with('error','The password and its confirmation do not match');
        }


        if(session('data')['role'] == 'admin'){
            $account = CompanyMember::where('email',session('data')['email'])->get();  

            $account[0]->password = $request->get('new_password');
            $account[0]->save();

            return redirect()->route('changePassword')->with('success','Password changed successfully');
        
        } else{
            $account = Member::where('email',session('data')['email'])->get();

            $account[0]->password = $request->get('new_password');
            $account[0]->save();

            return redirect()->route('changePassword')->with('success','Password changed successfully');
        }

        

    }

    public function test(Request $request){

        return view('test');
    }
    
}
