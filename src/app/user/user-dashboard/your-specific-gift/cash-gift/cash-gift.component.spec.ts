import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CashGiftComponent } from './cash-gift.component';

describe('CashGiftComponent', () => {
  let component: CashGiftComponent;
  let fixture: ComponentFixture<CashGiftComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CashGiftComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CashGiftComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
